<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
class EditCategory extends Component
{

    use WithFileUploads;
    public $imagenew,$orginalimage,$categorys,$idcategory, $units, $name, $image, $state, $note, $categoryparent,$maincat;
    public function mount($id)
    {
        $this->categorys = Category::get();
        $this->idcategory = $id;
        $category = Category::find($id);
        $this->maincat = ($category->childrens->count() > 0);
        $this->name      =  $category->category_name;
        $this->state     =  $category->category_active==1?true:false;
        $this->image     =  $category->image;
        $this->orginalimage     =  $category->orginalimage;
        $this->note      =  $category->category_note;
        $this->categoryparent =  $category->parent_id;
    }
    public function savecategory()
    {
        // dd($this->imagenew);
        $category = Category::find($this->idcategory);

        $category->update([
       'category_name'   =>$this->name,
       'image'           =>$this->imagenew != null ? uploadimages('category',$this->imagenew) :dd($this->orginalimage),
       'category_active' =>$this->state,
       'category_note'   =>$this->note,
       'parent_id'       =>$this->categoryparent

        ]);
        $this->dispatchBrowserEvent('swal',['message'=>'تم التعديل بنجاح' ]);


    }
    public function render()
    {

        return view('livewire.dashboard.category.edit-category');
    }
}
