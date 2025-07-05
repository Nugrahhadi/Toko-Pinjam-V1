<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Testimonial;

class TestimonialsSection extends Component
{
    public $testimonials;

    public function mount()
    {
        $this->testimonials = Testimonial::active()->featured()->get();
    }

    public function render()
    {
        return view('livewire.components.testimonials-section');
    }
}
