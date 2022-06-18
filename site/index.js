var icon_bar_header = document.querySelector('#bar_header');
var menu_bar_header = document.querySelector('.menu_bar_header');
var close_bar = document.querySelector('#close_bar');
var search_sort_product = document.querySelector('#search_sort_product');
var close_search_sort = document.querySelector('#closer_search_sort');
var wrap_price_search_freeship_show = document.querySelector('.wrap_price_search_freeship_show');

var filter_product = document.querySelector('#filter_product');
var aside_ribon = document.querySelector('.aside_ribon');

var sort_by = document.querySelector('#dropdownMenuButton1');
var option_sort_by = document.querySelectorAll('.option_sort');

icon_bar_header.onclick = function(){
    menu_bar_header.style.display = 'block';
    this.style.display = 'none';
    close_bar.style.display = 'block';
};
close_bar.onclick = function(){
    menu_bar_header.style.display = 'none';
    icon_bar_header.style.display = 'block';
    this.style.display = 'none';
};
// end close bar
search_sort_product.onclick = function(){
    wrap_price_search_freeship_show.style.display = 'flex';
    this.style.display = 'none';
    close_search_sort.style.display = 'block';
};
close_search_sort.onclick = function(){
    wrap_price_search_freeship_show.style.display = 'none';
    this.style.display = 'none';
    search_sort_product.style.display = 'block';
}

var closer_fil = document.querySelector('#closer_fil');
 closer_fil.onclick = function closers_fill(){
     aside_ribon.style.display = 'none';
     filter_product.style.display = 'block';  
     this.style.display = 'none';
}
;
filter_product.onclick = function open_fill(){
    aside_ribon.style.display = 'block';
    closer_fil.style.display = 'block';
    this.style.display = 'none';
};
