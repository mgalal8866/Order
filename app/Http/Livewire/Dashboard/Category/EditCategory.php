<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;

class EditCategory extends Component
{
    public $orginalimage,$categorys,$idcategory, $units, $name, $image, $state, $note, $categoryparent,$maincat;
    public function mount($id)
    {
        $this->categorys = Category::get();
        $this->idcategory = $id;
        $category = Category::find($id);
        $this->maincat = ($category->childrens->count() > 0);
        $this->name      =  $category->category_name;
        $this->state     =  $category->category_active;
        $this->image     =  $category->image;
        $this->orginalimage     =  $category->orginalimage;
        $this->note      =  $category->category_note;
        $this->categoryparent =  $category->parent_id;
    }
    public function savecategory()
    {

        $category = Category::find($this->idcategory);
        $category->update([
       'category_name'   =>$this->name,
       'category_active' =>$this->state,
       'image'           =>$this->orginalimage,
       'category_note'   =>$this->note,
       'parent_id'       =>$this->categoryparent

        ]);
       
    }
    public function render()
    {

        return view('livewire.dashboard.category.edit-category');
    }
}
