<?php

namespace App\Http\Livewire\Front\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductDetails;

class Viewcategory extends Component
{
    use WithPagination;
    public $categoryid,$pg=30,$cat ;
    public function mount($categoryid=null){
        $this->categoryid=$categoryid;
        $this->cat =Category::find($categoryid);
    }
    public function render()
    {
        $data = ['products'=>ProductDetails::Getcategory($this->categoryid)->online()->orderBy('updated_at','DESC')->paginate($this->pg)];
        return view('livewire.front.category.viewcategory',['data'=>$data])->layout('layouts.front-end.layout');
    }
}
