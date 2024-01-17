<?php
$card = [];
if ( ! empty( $args['card'] ) ) {
    $card = $args['card'];
}

?>

<a href="<?php echo $card['link'] ?>" class=" flex flex-col gap-2 lg:max-w-[282px] group relative z-40">
    <figure class="rounded-2xl flex justify-center items-center bg-[#F5F5F5] lg:w-[282px] lg:h-[319px] min-h-[168px] overflow-hidden ">
        <img class="group-hover:scale-110 duration-300" src="<?php echo $card['image']['url']?>" alt="<?php echo  $card['image']['alt']?>" title="<?php echo  $card['image']['title']?>">
    </figure>
    <div class="description__product flex flex-col gap-2 mt-2">
    <div class="flex lg:flex-row lg:justify-between lg:items-center flex-col-reverse">
        <span class="product-category"><?php echo $card['category']?></span>
        <span class="px-2 w-fit h-fit bg-[#F9941733] whitespace-nowrap text-[15.749px] text-[#F99417] rounded-full"><?php echo $card['discount'] ?> off</span>
    </div>    
        <span class="product-title"><?php echo $card['title']?></span>
    </div>
    <div class="mt-auto">
        <span class="product_price__after-discount">$<?php echo $card['price']?></span>
        <span class="product_price__before-discount">$<?php echo $card['price_before_discount']?></span>
    </div>
</a>