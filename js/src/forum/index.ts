import app from 'flarum/forum/app';
import { storeInit } from './storeInit';

app.initializers.add('xypp/store-template', () => {
  console.log('[xypp/store-template] Hello, forum!');

  storeInit(app);
});
