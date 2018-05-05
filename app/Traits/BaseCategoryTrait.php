<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 2018/2/10
 * Time: 10:01
 */

namespace App\Traits;


trait BaseCategoryTrait
{
    /**
     * 获取所有父分类 ID
     * @param int $parentid
     * @param array $arrparentids
     *
     * @return array
     */
    protected function getParentids($parentid, $arrparentids=null){
        $arrparentids = isset($arrparentids) ? $arrparentids : [];
        $parent = $this->where([[$this->primaryKey, $parentid]])->first();
        if(!$parent){
            return $arrparentids;
        }
        array_unshift($arrparentids, $parent->{$this->primaryKey});
        return $this->getParentids($parent->parentid, $arrparentids);
    }

    /**
     * 添加分类
     * @return void
     */
    public function saveCategory(){
        if(!$this->parentid){
            $this->parentid = 0;
            $this->arrparentid = 0;
        }else{
            $arrparentids = $this->getParentids($this->parentid);
            $this->arrparentid = implode(',', $arrparentids);
        }

        $this->linkurl = str_slug($this->{$this->category_name});
        $this->arrchildid = '';

        $this->letter = ucfirst(substr($this->{$this->category_name}, 0, 1));
        $this->save();
        $this->updateParentCategory();
    }

    /**
     * 更新当前分类 现在对应所有父类
     *
     */
    protected function updateParentCategory(){

        if($this->parentid){
            foreach(explode(',', $this->arrparentid) as $parentid){
                $parent = $this->where([[$this->primaryKey, $parentid]])->first();
                $parent->child = empty($parent) ? 0 : 1;

                // 把当前分类id 合并到 父类arrchilid中
                if($parent->arrchildid){
                    $arrchildids = explode(',', $parent->arrchildid);
                    if(!in_array($this->{$this->primaryKey}, $arrchildids)){
                        $arrchildids = array_merge($arrchildids, [$this->{$this->primaryKey}]);
                    }

                }else{
                    $arrchildids = [$this->{$this->primaryKey}];
                }

                //把原有的下级分类 合并到 父类 arrchildid中  主要针对 分类移动时候
                if($this->arrchildid){
                    foreach(explode(',', $this->arrchildid) as $cid){
                        if(!in_array($cid, $arrchildids)){
                            $arrchildids = array_merge($arrchildids, [$cid]);
                        }
                    }
                }
                sort($arrchildids);
                $parent->arrchildid = implode(',', $arrchildids);
                $parent->save();
            }
        }
    }

    /**
     * 更新当前分类 以前对应的所有父类
     */
    protected function updateOldParentCategory(){
        if($this->arrparentid){
            foreach(explode(',', $this->arrparentid) as $parentid){
                $parent = $this->where($this->primaryKey, $parentid)->first();
                $has_child = $this->where([['parentid', $parentid],[$this->primaryKey, '!=', $this->{$this->primaryKey}]])->first();
                $parent->child = $has_child ? 1 : 0;
                if($parent->arrchildid){
                    //需要删除的分类id, 包括当前的分类id 和 它的下级分类id
                    $this_childids = array_merge(explode(',', $this->arrchildid), [$this->{$this->primaryKey}]);

                    $arrchildids = array_filter(explode(',', $parent->arrchildid),
                        function($childid) use($this_childids){
                            return in_array($childid, $this_childids) === false;
                        });
                    $parent->arrchildid = implode(',', $arrchildids);
                    $parent->save();
                }
            }
        }
    }

    /**
     * 更新移动分类
     * 验证规则 parentid 父类不不能是自己或者是它的下级分类   验证可放在专门的数据验证模块中做， 这里给个演示
     */
    public function updateCategory(){

        //父类不不能是自己或者是它的下级分类
        if($this->parentid == $this->{$this->primaryKey} or in_array($this->parentid, explode(',', $this->arrchildid))){
            throw new Exception('Parent Category can not be for themselves or sub category');
        }
        $this->updateOldParentCategory();
        $arrparentids = $this->getParentids($this->parentid);

        //更新所有下级分类
        if($this->arrchildid){
            foreach(explode(',', $this->arrchildid) as $childid){
                $child = $this->where($this->primaryKey, $childid)->first();
                if($child){
                    $child_arrparentids = explode(',', $child->arrparentid);
                    $this_parentids =  explode(',', $this->arrparentid);
                    //过滤掉下级分类 原有的主分类
                    $child_arrparentids = array_filter($child_arrparentids, function($parentid) use($this_parentids){
                        return in_array($parentid, $this_parentids) === false;
                    });

                    //把现有的主分类 在开头添加到 下级分类中
                    foreach(array_reverse($arrparentids) as $pid){
                        array_unshift($child_arrparentids, $pid);
                    }


                    $child->arrparentid = implode(',', $child_arrparentids);
                    $child->save();
                }
            }
        }

        if($arrparentids){
            $this->arrparentid = implode(',', $arrparentids);
        }else{
            $this->arrparentid = 0;
        }

        $this->linkurl = preg_replace('/[^0-9a-zA-Z]+/', '-', $this->catname);
        $this->letter = ucfirst(substr($this->catname, 0, 1));

        $this->save();
        $this->updateParentCategory();
    }


    public function deleteCategory(){
        $this->updateOldParentCategory();
        $this->delete();
    }
}