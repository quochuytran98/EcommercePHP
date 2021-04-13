<i class="icon-handbag "></i>
                               
@php
$qty =  Cart::count();
 echo ' <span data-qty="'.$qty.'" class="header-action-num quochuy">'.$qty.'</span>';
@endphp

