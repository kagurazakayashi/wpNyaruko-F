# wpNyaruko-N 0.4

- wpNyaruko 系列的又一个主题，拥有主题 wpNyaruko-W 的一些特性。
  - 此分支虽然提供了很多自定义设置，但仍然主要是以定制网站开发的，因此不保证在其他网站上可以正确运行。
- 属于
  - 这是[雅诗个人网站项目](https://github.com/kagurazakayashi/kagurazakayashi.github.com)的一部分。
  - 这是北京未来赛车文化有限公司官网项目的一部分。

## 功能

- 拥有模块化的主页，可以自行增减不同样式的栏目。
  - 栏目自定义特性：
    - 每个栏目可以关联不同的分类目录。
    - 大部分栏目可以设置显示该分类目录中的多少条文章。
    - 可以自动获取文章中的第一张图片，作为文章列表的图片。
    - 可以自动检测文章中是否有视频，如果包含视频则会自动在文章列表的文章标题前加入视频播放图标。
    - 后台页面包括一个栏目排布器，可以进行图形化修改和导入导出栏目设置。
    - 大部分栏目包括一个标题行，和「更多」按钮。
  - 栏目样式包括：
    - 大图片。一张大图片，点击转到文章。
    - 纵向文章列表。一个文章一行的目录，包括关键字、时间日期、图片预览、标题、文章预览，点击转到文章。
    - 横向图片列表。横向滚动的图片，一个文章一张图片，点击转到文章。
    - 空白。用于调试和占位。
- 集成定制版 [NyarukoPlayer.js](https://github.com/kagurazakayashi/NyarukoPlayer.js) 动态背景图片效果。
  - 在主页上显示全屏动态图片背景。
  - 在文章顶端半屏动态图片标题区。
  - 动画结束后的行为可以在后台设定
    - 可设置是否首页的动画头图区自动缩小高度到一半。
    - 可设置如果用户已经向下划离动画头图区域则不缩小。
    - 可设置是否使用动画过渡。
    - 动画结束后停止播放动画或隐藏 NyarukoPlayer 开关。
- 响应式布局，可在手机和电脑上适配。
  - 随页面向下滚动，主菜单标题栏变为浮动并逐渐加深背景色。
  - 主菜单标题栏变为浮动模式时，Logo 图片(如果有)以动画方式缩小以防干扰阅读，反之亦然。
  - 如果屏幕宽度较小，菜单则自动变为菜单按钮，点击可以打开滑动式菜单栏。
- 重要信息提醒栏
  - 可以在主页和各文章页最顶端显示一条提醒信息。
  - 提醒信息包括一张图片和一行标题，点击可以前往指定的链接。
  - 当鼠标移过提醒栏时，在屏幕中暂时显示一张大图片。
  - 图片、文字、背景过渡颜色、鼠标移过大图，以及提醒信息开关均可在后台管理页面进行修改。
- 首页清新布局
  - 首页背景为全屏动态图片。
  - 左上角可以显示网站名称或者 Logo 。
  - 右上角是网站主栏目菜单，手机上访问会变为菜单按钮。
  - 左下角包括一个图片选项卡菜单栏位
    - 和主菜单一样，可以在后台创建菜单并手动绑定到此栏位。
    - 然后在每个条目的名称中写「图片路径#分类名或自定义名称」，即可显示图片选项卡按钮。
    - 若链接目标为分类，在「#」后面填写分类名可以自动亮起选项卡。
  - 右下角可以显示新浪微博和微信图标。
    - 鼠标移过可以显示二维码。
    - 点击和触摸可以直接前往。
    - 前往网址可以在后台自定义，二维码为自动生成。
    - 首页向下浏览，可以看到后台设定的所有内容模块。

## 自定义功能

暂无说明。

## 截图

暂无说明。

## 兼容性

- 欢迎使用最新版 Chrome 浏览器，这是该主题的开发环境。
- 支持其他带有最新版 webkit 内核浏览器。
- 可以适配最新版 Firefox 浏览器。
- 欢迎使用最新版 iOS 里的 Safari ，这是该主题的开发环境。
- Android 请使用最新版 Chrome 浏览器。
- 要正常使用，浏览器必须开启 JavaScript 。
- 要保存个性化设置，浏览器需要开启 Cookie 。

## 使用的第三方软件

- [jquery](https://github.com/jquery) / [jQuery](https://github.com/jquery/jquery)
- [kazuhikoarase](https://github.com/kazuhikoarase) / [qrcode-generator](https://github.com/kazuhikoarase/qrcode-generator/tree/master/js)
- [kagurazakayashi](https://github.com/kagurazakayashi) / [NyarukoPlayer.js](https://github.com/kagurazakayashi/NyarukoPlayer.js)

## 许可协议 License

### For users in China:

- 从 commit 3a007ea58fa03a0f5812e14dc8a993acb4b38a29 之后的版本开始（不包括该版本），本 repository 的版权已被 北京未来赛车文化有限公司 购买。在此版本之后发布的任何 commit 版本，均不可以用于商业目的。
- 如果需要将这些代码用于商业目的，必须得到 北京未来赛车文化有限公司 的允许，并且您可能需要同时为该公司和 kagurazakayashi 支付授权费用。
- 对于非商业目的的使用，遵循 GPL License 条款发布，所有链接到本产品的软件均应遵循 GPL License 。如果您不能接受 GPL License ，则需要按照上述商业方式购买许可。

### For users in other areas:

- This repository is released under the GPL (GPLv2 or GPLv3). So any link to this repository must follow GPL. If you cannot accept GPL, you need to be licensed from Beijing Future Racing Culture Co.Ltd. and @kagurazakayashi.
- Free Use for Those Who Never Copy, Modify or Distribute. Commercial Use for Everyone Else. To all commercial organizations, we do recommend the commercial license.