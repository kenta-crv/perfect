@extends('store.layouts.layout-store-hp')
@section('title', $title ?? '問合せ')
@section('content')
@component('store.component._p-index')
@slot('body')
@livewire('company.inquiry')
@endslot
  @endcomponent
  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo_cursor");
    let captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>
@endsection
