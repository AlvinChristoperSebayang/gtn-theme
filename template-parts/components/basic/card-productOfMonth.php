<?php
$card = [];
if ( ! empty( $args['card'] ) ) {
    $card = $args['card'];
}
$indexes= '';
$indexes = $args['indexes'];
?>

<a href="<?php echo $card['link'] ?>" class="card__productOfMonth__wrapper flex flex-col gap-4 lg:max-w-[317px] group lg:w-auto w-1/2 <?php echo $indexes == '1' ? 'first-product__ofTheMonth' : 'second-product__ofTheMonth'  ?>">
    <figure class="bg-white rounded-2xl flex justify-center items-center lg:w-[317px] lg:h-[358px] h-[168px] overflow-hidden">
        <img class="group-hover:scale-110 duration-300" src="<?php echo $card['image']['url']?>" alt="<?php echo  $card['image']['alt']?>" title="<?php echo  $card['image']['title']?>">
    </figure>
    <div class="description__product flex flex-col gap-2">
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