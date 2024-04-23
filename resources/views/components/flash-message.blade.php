@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show"
  class="fixed top-0 left-0 right-0 text-black text-center py-3" style="background-color: navajowhite">
  <p style="background-color: navajowhite">
    {{ session('message') }}
  </p>
</div>
@endif
