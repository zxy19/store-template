import Model from 'flarum/common/Model';
import ForumApplication from 'flarum/forum/ForumApplication';
import { addFrontendProviders } from "@xypp-store/forum"
import * as SS from "@xypp-store/forum"
// If not willing to configure webpack and ts,Just copy and using the helper
import Store from "./StoreHelper";
export function initStore(app: ForumApplication) {
  //With the helper, use Store.addFrontendProviders instead.
  addFrontendProviders(
    //Provider id
    "fake-item",
    //Provider name
    app.translator.trans("xypp-store-template.forum.fake") as string,
    //Get provider data
    async function getProviderData(providerDatas, special) {
      // You can fetch the options of the provider data and put it into the providerDatas.
      providerDatas['default'] = app.translator.trans("xypp-store-template.forum.default") as string
      // If need values from user input, you can set the callback for keys has been put in the providerDatas.
      special['default'] = async () => {
        return prompt("Please enter the data you want to use") || ""
      }
    },
    undefined,
    async function (str): Promise<string> {
      // Get use data. If needed, you can use modal to get data for use.
      return "";
    }
  )

  // With minimal configuration
  // Will perform as "No Preview", Create with data "default".
  addFrontendProviders(
    "fake-item-test",
    app.translator.trans("xypp-store-template.forum.fake-tests") as string
  );
}
