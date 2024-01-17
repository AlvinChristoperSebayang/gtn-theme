import httpClient from './httpClient';
import axios from 'axios';

export default class Woo {
  // static getProducts() {
  //   return httpClient.get('/woocommerce/products');
  // }

  static getProductst(formData) {
    // console.log('sdfadsfsa',formData);
    let paged = formData.paged;
    const catsFilter = formData.cats;
    // console.log('page',paged);
    // console.log('cats',catsFilter);
    return httpClient.post('/woocommerce/products', formData);
  }
}