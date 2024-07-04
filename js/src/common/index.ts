import app from 'flarum/common/app';

app.initializers.add('xypp/store-template', () => {
  console.log('[xypp/store-template] Hello, forum and admin!');
});
