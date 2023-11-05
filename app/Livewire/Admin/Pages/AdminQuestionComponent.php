<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Question;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AdminQuestionComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('layouts.admin')]
    public $search;
    public $perPage = 6;
    public $sorting = 'default';
    public $isOpen = 0;
    public $question;

    public $questionId;
    public function openModel($id)
    {
        $this->questionId =$id;
        $this->mount();
        $this->isOpen = true;
        
    }
    public function mount()
    {
        // Fetch the page data and populate the form fields
        if($this->questionId){
            $question = Question::find($this->questionId);
        //dd($page);
        if ($question) {
            $this->question = $question->question;
        }
        }
    }
   

    public function closeModal()
    {

        $this->isOpen = false;
        $this->reset();

    }
    public function editQuestion()
    {
        $this->validate([
            'question' => 'required|string',
        ]);

        $question = Question::find($this->questionId);
        $question->question = $this->question;
        $question->save();
        $this->closeModal();
        $this->alert('success', 'Question has been updated');
    }

    public function render()
    {
        if($this->sorting === 'default'){
            $questions = Question::where('question','LIKE','%' . $this->search .'%')->orderBy('created_at','desc')->paginate($this->perPage);
        }else{
            $questions = Question::where('question','LIKE','%' . $this->search .'%')->orderBy('question',$this->sorting)->paginate($this->perPage);
        }
        return view('livewire.admin.pages.admin-question-component',['questions'=>$questions]);
    }
}
