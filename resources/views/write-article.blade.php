@extends('layouts.guest')

@section('title', 'Tulis Artikel Baru')

@section('content')
<!-- Include Livewire ArticleEditor Component with custom rich text editor -->
@livewire('article-editor')
@endsection
