import Model from 'flarum/common/Model';
import ForumApplication from 'flarum/forum/ForumApplication';
import Store from './StoreHelper';
export function initStore(app: ForumApplication) {
  Store.addFrontendProviders(
    //Provider id
    "fake-item",
    //Provider name
    app.translator.trans("xypp-store-template.forum.fake") as string,
    //Get provider data
    async function getProviderData(providerDatas) {
      // You can fetch the options of the provider data and put it into the providerDatas.
      providerDatas['default'] = app.translator.trans("xypp-store-template.forum.default") as string
    },
    function createItemShowCase(item, purchase_history) {
      return (
        <div style="text-align:center;">
          {// The element returned here will be displayed in the store item's show case.
          }
        </div>
      );
    },
    async function (str): Promise<string> {
      // Get use data. If needed, you can use modal to get data for use.
      return "";
    }
  )
}
