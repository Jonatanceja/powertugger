@php

$products = page('productos')->children()->listed();

$tags = $products->pluck('category', ',', true);


@endphp
@foreach($tags as $tag)
    <li class="text-stone-800 md:text-white no-underline hover:text-amber-400 uppercase list-none text-sm ml-2 md:ml-0">
      <a href="<?= page('productos')->url(['params' => ['category' => $tag]]) ?>">
        <?= html($tag) ?>
      </a>
    </li>
@endforeach
