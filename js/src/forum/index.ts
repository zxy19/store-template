import app from 'flarum/forum/app';
import Store from './StoreHelper';
import { initStore } from './storeInit';

app.initializers.add('xypp/store-template', () => {
  initStore(app);
  setTimeout(async () => {
    const helper = await Store.UseHelper.get("fake-item-test");
    //Ask use to select a item to use.
    await helper.filterAvailable().expireTime().query();
    if (helper.hasItem()) {
      await helper.use("data here");
    }
  }, 1000);
});
