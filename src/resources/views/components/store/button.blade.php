

<a {{ $attributes->merge([
    'class' => $active ? "c-lbl-success btn-right-white txt-dec-none $customClass" : "c-lbl-plain btn-right txt-dec-none $customClass",
    'href' => '#',
    ])
  }}>
  {{ $slot }}
</a>
