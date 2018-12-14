![wpNyaruko](https://github.com/kagurazakayashi/wpNyaruko-F/blob/master/images/wpNyaruko.gif) F

[介绍](#功能) | [功能](#功能) | [自定义](#自定义) | [截图](#截图) | [兼容性](#兼容性) | [第三方](#使用的第三方软件) | [License](#许可协议-license)

- 警告：目前尚未开发完成，请勿使用。

## 介绍

- wpNyaruko 系列的又一个主题，拥有主题 wpNyaruko-W 的一些特性。
  - 此分支虽然提供了很多自定义设置，但仍然主要是以定制网站开发的，因此不保证在其他网站上可以正确运行。
  - 目前尚未开发完成。
  - 目前有两个大版本，2017版和2018版。具体版本功能已在下面说明。2018版优先维护，而2017版的很多内容仍然可以通过设置切换。
  - [查看当前版本号](https://github.com/kagurazakayashi/wpNyaruko-F/blob/master/version.php)
- 版权归属
  - 这是 [yaNyaruko Project](https://github.com/kagurazakayashi) 项目的一部分，神楽坂雅詩拥有其部分版权。
  - 这是 [北京未来赛车文化有限公司](https://www.futureracing.com.cn) 官网的一部分，北京未来赛车文化有限公司拥有其主要版权。
  - 这是 [北京篝火网络科技有限公司](https://github.com/bjbonfire) 业务的一部分，北京篝火网络科技有限公司拥有其部分版权。
  - 非以上单位或个人，请勿将此项目用于商业用途，其他目的须遵守 GPL 协议。有关详细信息请前往[许可协议](#许可协议-license)节了解。

## 功能

- 拥有模块化的主页，可以自行增减不同样式的栏目。
  - 栏目自定义特性：
    - 手机浏览和电脑浏览的模块设置完全分离，可以在手机和电脑采用不同的样式或不同的内容。
    - 每个栏目可以关联不同的分类目录。
    - 大部分栏目可以设置显示该分类目录中的多少条文章。
    - 可以自动获取文章中的第一张图片，作为文章列表的图片。
    - 可以自动检测文章中是否有视频，如果包含视频则会自动在文章列表的文章标题前加入视频播放图标。
    - 后台页面包括一个栏目排布器，可以进行图形化修改和导入导出栏目设置。
    - 大部分栏目包括一个标题行，和「更多」按钮。
  - 栏目样式包括：
    - 大图片。一张大图片，点击转到文章。
    - 纵向文章列表。一个文章一行的目录，包括关键字、时间日期、图片预览、标题、文章预览，点击转到文章。
    - 块状文章列表。一个文章一个方形块，包括关键字、时间日期、图片预览、标题，点击转到文章，类似于纵向文章列表的手机板式。自动根据页面宽度决定每行的显示数量。
    - 横向图片列表（2018版）。使用横向滚动的多张图片（[NyarukoShowcase.js](https://github.com/kagurazakayashi/NyarukoShowcase.js)），一个文章一张图片，点击转到文章。
    - 横向图片列表（2017版）。使用 Bootstrap 实现的横向图片列表，已弃用。
    - 块状文章列表。瓷砖布局，一个文字一个块，包括关键字、时间日期、图片预览、标题，点击转到文章。
      - 支持动态横向列表数量，可从每行显示 1-5 个文章预览，根据宽度自动决定。
      - 支持同步自身宽度到其他模块，使整个页面所有元素左右留白同等。
      - 多出来的未填满的行可以实时自动进行隐藏。
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
  - 随页面向下滚动，主菜单标题栏变为浮动并逐渐加深背景色（2017版）。
  - 主菜单标题栏变为浮动模式时，Logo 图片(如果有)以动画方式缩小以防干扰阅读，反之亦然（2017版）。
  - 如果屏幕宽度较小，菜单则自动变为菜单按钮，点击可以打开滑动式菜单栏。
- 重要信息提醒栏
  - 可以在主页和各文章页最顶端显示一条提醒信息。
  - 提醒信息包括一张图片和一行标题，点击可以前往指定的链接。
  - 当鼠标移过提醒栏时，在屏幕中暂时显示一张大图片。
  - 图片、文字、背景过渡颜色、鼠标移过大图，以及提醒信息开关均可在后台管理页面进行修改。
- 模块化首页顶端（第一屏）样式，以模块化加载
  - 环绕式第一屏主题（2017版）
    - 首页背景为全屏动态图片。
    - 左上角可以显示网站名称或者 Logo 。
    - 右上角是网站主栏目菜单，手机上访问会变为菜单按钮。
    - 左下角包括一个图片选项卡菜单栏位
        - 和主菜单一样，可以在后台创建菜单并手动绑定到此栏位。
        - 然后在每个条目的名称中写「图片路径#分类名或自定义名称」，即可显示图片选项卡按钮。
        - 若链接目标为分类，在「#」后面填写分类名可以自动亮起选项卡。
    - 右下角可以显示新浪微博和微信图标。
        - 鼠标移过可以显示二维码，点击和触摸可以直接前往。
        - 前往网址可以在后台自定义，二维码为自动生成。
  - 清爽式第一屏主题（2018版）
    - 首页背景为全屏动态图片。
    - 左上角可以显示网站名称或者 Logo 。
    - 右上角显示主菜单列、一个可以展开式的副菜单按钮、微博和微信按钮。
      - 微博和微信按钮鼠标移过可以显示二维码，点击和触摸可以直接前往。
      - 前往网址可以在后台自定义，二维码为自动生成。
      - 手机浏览时，主菜单列不显示。
      - 副菜单按钮可以单独指定电脑和手机浏览时显示的内容，通常可以把手机浏览时因为空间不足被隐藏掉的主菜单列中的菜单项进行整合。
    - 顶栏下方提供一个子顶栏
      - 包括菜单名称文字，和一个图片选项卡菜单栏位。
        - 和主菜单一样，可以在后台创建菜单并手动绑定到此栏位。
        - 然后在每个条目的名称中写「图片路径#分类名或自定义名称」，即可显示图片选项卡按钮。
    - 左侧滑出菜单支持二级菜单。
  - 首页向下浏览，可以看到后台设定的所有内容模块。
- 文章或页面内容自动排版优化
  - 主题会自动为每个段落进行首行缩进
    - 会自动识别文字行还是多媒体行，仅为文字行加入首行缩进。
    - 文字行识别范围不只限于 `<p>` 标签。
  - 主题会自动为文章或页面中的所有图片自动设定宽度高度
    - 图片会以文字段落区域宽度为基准，居中显示，上下左右留一定边距，计算宽度铺满。
    - 图片左右边距在电脑访问时左右留一成也宽宽度边距，而在手机访问时左右不留边距，显示屏幕宽的图片。
    - 如果图片未超过显示区域宽度，则不进行自动宽度设置以保证清晰。
    - 高度根据图片比例和新设置的宽度自动决定。
  - 首行缩进量可以在后台实现像素级别的设置。
  - 图片自动宽度调整的左右边距可以在后台分别设置电脑访问时和手机访问时的边距百分比。
  - 每个文章或页面可以通过首行短代码自行决定是否接受主题自动排版，可以决定每个文章或页面的自动排版的级别。
- 更方便的后台
  - 如果以管理员方式登录，网站名称或者 Logo 旁边会显示齿轮图标，点击直接进入后台。
  - 主题自带能够更加便捷前往功能的后台面板，代替 WordPress 的仪表盘，并可以随时切换回去。
  - 如果同时使用了 wpNyarukoLive 插件，会自动增加该插件设置页面的便捷入口。

## 自定义

### 不要为我的某个文章/页面进行行缩进和图片尺寸设定：

- 在文章顶端加入（必须是第一行第一字起，包括符号 `[]` ，目前不支持多个条件）：
  - `[noformat]` 或者 `[noformat=all]`
    - 主题停止对当前文章进行排版，包括首行缩进、图片宽度适应等，以及以后加入的文章排版相关功能。
  - `[noformat=img]`
    - 仅禁用图片宽度适应。
  - `[noformat=indent]`
    - 仅禁用首行缩进。

### 在分类目录的页面顶端加入分类介绍等内容

- 插入纯文本
  - 在「标签」的「描述」栏直接填写文字内容即可。
- 将自定义页面插入到分类目录中文章列表的顶端
  - 在「标签」的「描述」栏填写 `page_id=**`（不要添加其他文字）即可在分类目录和标签目录的顶端显示该页面的内容。

### 通过代码编辑主页模块设置

- 在后台点击 `导入/导出/编辑 主页模块配置代码` ，可以打开代码编辑模式。
  - 可以通过复制粘贴来导入或导出这些设置。
  - 代码输入规则： `模块编号_分类目录编号_显示文章数量|模块编号_分类目录编号_显示文章数量|...|`
    - 示例： `0_4_1|3_5_4|2_18_6|3_3_10|2_7_5|`

### 二维码(尚未提供)

- 要获得当前文章/页面的二维码，使用主题内置小工具「当前页面二维码」即可。
- 或者，直接插入以下代码到需要的地方：
  - `<div id="qrview"></div><script type="text/javascript">qr();</script>`
  - `qr()` 可以输入以下参数：
    - text（要编码的文字） = ""（默认值为当前页面网址）
    - divid（要填入div的ID） = ""（默认值为"qrview"）
    - imgtype（输出格式） = tab（表格）,svg（矢量图）,img（普通图片）（默认值：tab）
    - type（类型） = 1-40（默认值：10）
    - errorcorrection（容错级别） = L,M,Q,H（默认值：L）
    - mode（内容模式） = Numeric,Alphanumeric,Byte,Kanji（默认值：Byte）
- 小工具和插入代码的参数默认值可以在主题设定中修改。

## 调试

在网址后面加入以下参数，可以实现相应的功能。

- `#noformat`
  - 适用于：文章页
  - 功能：强制禁止对文章版式进行格式化。
- `#noformat`
  - 适用于：文章页
  - 功能：强制对文章版式进行格式化。
- `#formatlog`
  - 适用于：已启用文章版式格式化功能的文章页。
  - 功能：显示文章格式化过程（行数，行类别，行内容）。

## 截图

- © 以下截图来自使用本产品的 [北京未来赛车文化有限公司](https://www.futureracing.com.cn) 官网，未来赛车和其版权合作商拥有截图中展示的资讯内容图文的版权，请勿对这些图片进行再分发。
- 截图文字介绍均按从左到右、从上到下描述。

![截图集合](https://github.com/kagurazakayashi/wpNyaruko-F/blob/master/screenshots/www_futureracing_com_cn_fullpage_2018_HD.jpg)
图为2018版的 完整页面、分类目录页面、手机二级菜单页面、主题后台设置页面、重大信息提醒栏。

![版本主页和列表页对比](https://github.com/kagurazakayashi/wpNyaruko-F/blob/master/screenshots/www_futureracing_com_cn_title_2017_2018_HD.jpg)
左侧为2017版的主页和列表页，右侧为2018版的主页和列表页。

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
- yaNyaruko Project [@kagurazakayashi](https://github.com/kagurazakayashi)
  - [NyarukoPlayer.js](https://github.com/kagurazakayashi/NyarukoPlayer.js)
  - [NyarukoShowcase.js](https://github.com/kagurazakayashi/NyarukoShowcase.js)
  - [wpNyarukoLive](https://github.com/kagurazakayashi/wpNyarukoLive) （如果已安装并启用）

## 许可协议 License

### For users in China:

- 从 commit 3a007ea58fa03a0f5812e14dc8a993acb4b38a29 之后的版本开始（不包括该版本），本 repository 的版权已被 北京未来赛车文化有限公司 购买。在此版本之后发布的任何 commit 版本，均不可以用于商业目的。
- 北京未来赛车文化有限公司、北京篝火网络科技有限公司、kagurazakayashi 共享本作品版权。
- 如果需要将这些代码用于商业目的，必须得到 北京未来赛车文化有限公司 的允许，并且您可能需要同时为该公司和 北京篝火网络科技有限公司 或 kagurazakayashi 支付授权费用。您可以[通过 issues 请求购买](https://github.com/kagurazakayashi/wpNyaruko-F/issues)。
- 对于非商业目的的使用，遵循 GPL License 条款发布，所有链接到本产品的软件均应遵循 GPL License 。如果您不能接受 GPL License ，则需要按照上述商业方式购买许可。

### For users in other areas:

- This repository is released under the GPL (GPLv2 or GPLv3). So any link to this repository must follow GPL. If you cannot accept GPL, you need to be licensed from Beijing Future Racing Culture Co.Ltd. and @kagurazakayashi.
- Free Use for Those Who Never Copy, Modify or Distribute. Commercial Use for Everyone Else. To all commercial organizations, we do recommend the commercial license.