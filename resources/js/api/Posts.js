import httpClient from './httpClient';
import axios from 'axios';

export default class Posts {
  static getLatestPosts() {
    return httpClient.get('/posts/latest');
  }
}