  <template>
    <section
      class="section_header_page_product__wrapper bg-[#3630621A] lg:pt-28 pb-[77px] w-full flex relative overflow-hidden"
    >
      <div class="container flex flex-col gap-[22px] relative">
        <div
          class="lg:w-[536px] lg:h-[536px] rounded-full circle-ornament absolute lg:-top-48 lg:-right-32 border border-[#5129A6] opacity-[0.2] z-30"
        ></div>
        <div
          class="lg:w-[536px] lg:h-[536px] rounded-full circle-ornament absolute -top-12 left-0 border border-[#5129A6] opacity-[0.2] z-4 0"
        ></div>
        <h1 class="text-[32px] font-normal leading-10 lg:max-w-[384px]">
          Our Product
        </h1>
        <p class="text-[#202020B2] lg:max-w-[384px]">
          nostra, per inceptos himenaeos. Praesent auctor purus luctus enim
          egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse
          ac rhoncus nisl, eu tempor urna. Curabitur velz
        </p>
      </div>
    </section>
    <section class="show_product_wrapper w-full flex justify-between container py-6">
      <form class="bg-black">
        <button type="submit"></button>

        <input type="" name="" value="" />
      </form>
      <div class="filter_product_element">
        <div
          class="filter_category px-4 py-3 border border-[#363062] rounded-full "
        >
          <span class="font-bold text-default pr-1 mr-1 border-r-2 border-r-black">Category</span>
          <select class="border-none  p-0 focus:border-none focus:outline-none focus:ring-0 cat_select text-[16px] duration-300 w-[51px] font-default text-[#36306280]" :class="cats" v-model="cats"  @change="fetchProducts">
            <option value=""  selected>All</option>   
            <option v-for="(category,index) in this.categoryproduct" :key="index" :value="category.slug">{{ category.name }}</option>
          </select>
        </div>
        <div class="filter_price"></div>
        <div class="filter_time"></div>
      </div>
    </section>
    <section class="catalog_products__wrapper grid lg:grid-cols-4 container relative min-h-screen ">
      <section v-if="loading" class="loading-indicator">
        <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </section>
      <a   v-for="product in products" :key="product.id" :href="product.link" class=" flex flex-col gap-2 lg:max-w-[282px] group relative z-40" >
      <figure class="rounded-2xl flex justify-center items-center bg-[#F5F5F5] lg:w-[282px] lg:h-[319px] min-h-[168px] overflow-hidden ">
          <img class="group-hover:scale-110 duration-300" :src="product.image.url" :alt="product.title" :title="product.title" loading="lazy">
      </figure>
      <div class="description__product flex flex-col gap-2 mt-2">
      <div class="flex lg:flex-row lg:justify-between lg:items-center flex-col-reverse">
          <span class="product-category">{{product.category}}</span>
          <span class="px-2 w-fit h-fit bg-[#F9941733] whitespace-nowrap text-[15.749px] text-[#F99417] rounded-full">{{ product.discount }} off</span>
      </div>    
          <span class="product-title">{{product.title}}</span>
      </div>
      <div class="mt-auto">
          <span class="product_ price__after-discount">{{product.price}}</span>
          <span class="product_price__before-discount">{{product.price_before_discount}}</span>
      </div>
  </a>
    </section>
    <section class="pagination_wrapper w-full flex justify-center items-center mt-6  lg:gap-4 container mb-24">
         <button
        v-if="currentPage > 1"
        @click="goToPage(currentPage - 2)"
        class="page-numbers"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none">
                    <path d="M13 9L10 12L13 15" stroke="#2E2953" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
      </button>
        <button
          v-for="pageNumber in totalPages"
          :key="pageNumber"
          @click="goToPage(pageNumber)"
          class="page-numbers"
        :class="{ current: pageNumber === currentPage || (pageNumber === 1 && currentPage === 0) }"
        >
          {{ pageNumber }}
        </button>
        <button
        v-if="currentPage < totalPages"
        @click="goToPage(currentPage + 1)"
        class="page-numbers"
      >
       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none">
                    <path d="M11 15L14 12L11 9" stroke="#2E2953" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
      </button>
      
    </section>
  </template>
  <script>
  import Loading from "vue-loading-overlay";
  import "vue-loading-overlay/dist/css/index.css";
  import { isProxy, nextTick, toRaw, watch } from "vue";

  export default { 
    props:['categoryproduct'],   
      data() {
        return{
        products: [],
        currentPage: 1,
        cats:'all',
        totalPages: null,
         selectedCategory: 'all',
         loading: false
        }
      },
    
    created() {
      this.loading = true;
      this.getProduct(this.currentPage);
    },
  
    methods: {
      //   fetchProducts(page) {
      //     this.loading = true;
      //   this.$api.Woo.getProducts(page)
      //     .then(response => {
      //       this.loading = false;
      //       this.products = response.data.products;
      //       this.totalPages = response.data.pagination.total_pages;
      //       this.currentPage = response.data.pagination.current_page;
      //       this.info = response.data.current_page; 
      //       console.log(response);
      //     })
      //     .catch(error => {
      //       this.loading = false;
      //       console.error('Error fetching products', error);  
      //     });
      // },
      fetchProducts() {
      this.loading = true;
      this.currentPage = 1; 
      this.getProduct(this.currentPage);
      
      let catWord = this.cats.replace(" ", "");
      let catSpace = this.cats.split('-');
      let spaceCount =  catSpace.length-1;
      let totalWord = catWord.length-spaceCount;
        if(this.cats == '' ){
          catWord = 'all';
        }
        


      console.log('cats', this.cats);
      console.log('words', catWord.length );
      console.log('word space', spaceCount);
      let totalWordWidth = totalWord * 9;
      let totalSpaceWidth = spaceCount * 4;
      let totalWidthCat = totalWordWidth + totalSpaceWidth + 24;
      console.log('cats px',totalWord);
      console.log('words', totalSpaceWidth );
      document.querySelector('.cat_select').style.width = totalWidthCat  + 'px';
      },
    //   measureTextWidth(text) {
    //   const tempSpan = document.createElement('span');
    //   tempSpan.style.visibility = 'hidden';
    //   tempSpan.style.position = 'absolute';
    //   tempSpan.style.whiteSpace = 'nowrap';
    //   tempSpan.innerHTML = text;
    //   this.$el.appendChild(tempSpan);
    //   const width = tempSpan.offsetWidth;
    //   this.$el.removeChild(tempSpan);
    //   return width;
    // },
        goToPage(page ) {   
         this.loading = true;
        this.getProduct(page);
      },
      getProduct(paged){
        if (this.cats == 'all'){
          this.cats = ''
        }
        let queData = {
          paged : paged,
          cats : this.cats
        }
        this.$api.Woo.getProductst(queData)
        .then(response => {
            this.loading = false;
            this.products = response.data.products;
            this.totalPages = response.data.pagination.total_pages;
            this.currentPage = response.data.pagination.current_page;
            this.info = response.data.current_page; 
          })
          .catch(error => {
            this.loading = false;
            console.error('Error fetching products', error);  
          });
      },
    },
    mounted(){
      this.getProduct(1);
     
    },
    watch: {
      products: {
                  handler(_products) {
                      console.log('test',_products)
                  }
              },
              cats(newCats, oldCats) {
      if (newCats !== oldCats) {
        this.currentPage = 1; // Reset halaman saat kategori berubah
        this.getProduct(1); // Panggil kembali getProduct dengan halaman 1 dan kategori terpilih yang baru
      }
    }
    }
  };
  </script>
<style>
  .loading-indicator {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(163, 163, 163, 0.7); 
  z-index: 9999; 
}
.lds-roller {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
 
}
.lds-roller div {
  animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  transform-origin: 40px 40px;
 
}
.lds-roller div:after {
  content: " ";
  display: block;
  position: absolute;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background-color: #363062;
  margin: -4px 0 0 -4px;
}
.lds-roller div:nth-child(1) {
  animation-delay: -0.036s;
}
.lds-roller div:nth-child(1):after {
  top: 63px;
  left: 63px;
}
.lds-roller div:nth-child(2) {
  animation-delay: -0.072s;
}
.lds-roller div:nth-child(2):after {
  top: 68px;
  left: 56px;
}
.lds-roller div:nth-child(3) {
  animation-delay: -0.108s;
}
.lds-roller div:nth-child(3):after {
  top: 71px;
  left: 48px;
}
.lds-roller div:nth-child(4) {
  animation-delay: -0.144s;
}
.lds-roller div:nth-child(4):after {
  top: 72px;
  left: 40px;
}
.lds-roller div:nth-child(5) {
  animation-delay: -0.18s;
}
.lds-roller div:nth-child(5):after {
  top: 71px;
  left: 32px;
}
.lds-roller div:nth-child(6) {
  animation-delay: -0.216s;
}
.lds-roller div:nth-child(6):after {
  top: 68px;
  left: 24px;
}
.lds-roller div:nth-child(7) {
  animation-delay: -0.252s;
}
.lds-roller div:nth-child(7):after {
  top: 63px;
  left: 17px;
}
.lds-roller div:nth-child(8) {
  animation-delay: -0.288s;
}
.lds-roller div:nth-child(8):after {
  top: 56px;
  left: 12px;
}
@keyframes lds-roller {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>