<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    /**
     * @dataProvider addCategoryProvider
     */
   public function testSaveCategory($catname, $parentid){
        $category = new Category();
        $category->catname = $catname;
        $category->parentid = $parentid;
        $category->saveCategory();

        $this->assertNotEmpty($category->catid);


        $parent = Category::find($parentid);
        if($parent){
            $this->assertEquals(1, $parent->child);
            $this->assertContains($category->catid, explode(',', $parent->arrchildid));
        }

   }




    public function addCategoryProvider(){
        return [
            'servo motor 5-1'  => ['servo motor 5-1', 22],
        ];
    }
}
