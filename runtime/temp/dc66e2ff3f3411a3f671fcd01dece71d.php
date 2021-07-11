<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy_pro\WWW\CQCQ\public/../application/index\view\welcome\welcome.html";i:1625986746;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>首页二</title>
  <meta name="renderer" content="webkit" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="/cqcq/public/static/lib/layui-v2.5.5/css/layui.css" media="all" />
  <link rel="stylesheet" href="/cqcq/public/static/lib/font-awesome-4.7.0/css/font-awesome.min.css" media="all" />
  <link rel="stylesheet" href="/cqcq/public/static/css/public.css" media="all" />
  <style>
    .layui-card {
      border: 1px solid #f2f2f2;
      border-radius: 5px;
    }

    .icon {
      margin-right: 10px;
      color: #1aa094;
    }

    .icon-cray {
      color: #ffb800 !important;
    }

    .icon-blue {
      color: #1e9fff !important;
    }

    .icon-tip {
      color: #ff5722 !important;
    }

    .layuimini-qiuck-module {
      text-align: center;
      margin-top: 10px;
    }

    .layuimini-qiuck-module a i {
      display: inline-block;
      width: 100%;
      height: 60px;
      line-height: 60px;
      text-align: center;
      border-radius: 2px;
      font-size: 30px;
      background-color: #f8f8f8;
      color: #333;
      transition: all 0.3s;
      -webkit-transition: all 0.3s;
    }

    .layuimini-qiuck-module a cite {
      position: relative;
      top: 2px;
      display: block;
      color: #666;
      text-overflow: ellipsis;
      overflow: hidden;
      white-space: nowrap;
      font-size: 14px;
    }

    .welcome-module {
      width: 100%;
      height: 210px;
    }

    .panel {
      background-color: #fff;
      border: 1px solid transparent;
      border-radius: 3px;
      -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }

    .panel-body {
      padding: 10px;
    }

    .panel-title {
      margin-top: 0;
      margin-bottom: 0;
      font-size: 12px;
      color: inherit;
    }

    .label {
      padding: 0.2em 0.6em 0.3em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      color: #fff;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: 0.25em;
      margin-top: 0.3em;
    }

    .layui-red {
      color: red;
    }

    .main_btn>p {
      height: 40px;
    }

    .layui-bg-number {
      background-color: #f8f8f8;
    }

    .layuimini-notice:hover {
      background: #f6f6f6;
    }

    .layuimini-notice {
      padding: 7px 16px;
      clear: both;
      font-size: 12px !important;
      cursor: pointer;
      position: relative;
      transition: background 0.2s ease-in-out;
    }

    .layuimini-notice-title,
    .layuimini-notice-label {
      padding-right: 70px !important;
      text-overflow: ellipsis !important;
      overflow: hidden !important;
      white-space: nowrap !important;
    }

    .layuimini-notice-title {
      line-height: 28px;
      font-size: 14px;
    }

    .layuimini-notice-extra {
      position: absolute;
      top: 50%;
      margin-top: -8px;
      right: 16px;
      display: inline-block;
      height: 16px;
      color: #999;
    }
  </style>
</head>

<body>
  <div class="layuimini-container">
    <div class="layuimini-main">
      <div class="layui-row layui-col-space15">
        <div class="layui-col-md8">
          <div class="layui-row layui-col-space15">
            <div class="layui-col-md6" style="width: 100%;">
              <div class="layui-card" style="height: 180px;">
                <div class="layui-card-header">
                  <i class="fa fa-warning icon"></i>数据统计
                </div>
                <div class="layui-card-body">
                  <div class="welcome-module">
                    <div class="layui-row layui-col-space10">
                      <div class="layui-col-xs6" style="width: 25%;">
                        <div class="panel layui-bg-number">
                          <div class="panel-body">
                            <div class="panel-title">
                              <span class="label pull-right layui-bg-blue">实时</span>
                              <h5>今日抽查率</h5>
                            </div>
                            <div class="panel-content">
                              <h1 class="no-margins" id="tod"></h1>
                              <small>当前分类总记录数</small>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="layui-col-xs6" style="width: 25%;">
                        <div class="panel layui-bg-number">
                          <div class="panel-body">
                            <div class="panel-title">
                              <span class="label pull-right layui-bg-cyan">实时</span>
                              <h5>今日签到率</h5>
                            </div>
                            <div class="panel-content">
                              <h1 class="no-margins" id="todn"></h1>
                              <small>当前分类总记录数</small>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="layui-col-xs6" style="width: 25%;">
                        <div class="panel layui-bg-number">
                          <div class="panel-body">
                            <div class="panel-title">
                              <span class="label pull-right layui-bg-orange">实时</span>
                              <h5>本周抽查率</h5>
                            </div>
                            <div class="panel-content">
                              <h1 class="no-margins" id="sev"></h1>
                              <small>当前分类总记录数</small>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="layui-col-xs6" style="width: 25%;">
                        <div class="panel layui-bg-number">
                          <div class="panel-body">
                            <div class="panel-title">
                              <span class="label pull-right layui-bg-green">实时</span>
                              <h5>本周签到率</h5>
                            </div>
                            <div class="panel-content">
                              <h1 class="no-margins" id="sevn"></h1>
                              <small>当前分类总记录数</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="layui-col-md12">
              <div class="layui-card">
                <div class="layui-card-header">
                  <i class="fa fa-line-chart icon"></i>报表统计
                </div>
                <div class="layui-card-body">
                  <div id="echarts-records" style="width: 100%; min-height: 500px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="layui-col-md4">
          <div class="layui-card">
            <div class="layui-card-header">
              <i class="fa fa-file-text" style="color: #009966; margin-right: 10px;"></i>今日未签名单
            </div>
            <div class="layui-card-body layui-text" name="records" style="max-height: 220px; overflow-y: auto;"></div>
          </div>

          <div class="layui-card">
            <div class="layui-card-header">
              <i class="fa fa-exclamation-triangle" style="color: red; margin-right: 10px;"></i>本月未签警告<text
                style="font-size: 5px;"> (3次及以上)</text>
            </div>
            <div class="layui-card-body layui-text" name="more" style="max-height: 250px; overflow-y: auto;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="/cqcq/public/static/lib/layui-v2.5.5/layui.js" charset="utf-8"></script>
  <script src="/cqcq/public/static/js/lay-config.js?v=1.0.4" charset="utf-8"></script>
  <script>
    layui.use(["layer", "miniTab", "echarts"], function () {
      var $ = layui.jquery,
        layer = layui.layer,
        miniTab = layui.miniTab,
        echarts = layui.echarts;

      miniTab.listen();

      //数据统计
      $.ajax({
        type: "POST",
        url: "index.php?s=index/welcome/get_line",
        async: false,
        success: function (msg) {
          console.log(msg);
          var tod = document.getElementById("tod");
          tod.innerHTML = msg["data"]["today_chou"];

          var todn = document.getElementById("todn");
          todn.innerHTML = msg["data"]["today_num"];

          var sev = document.getElementById("sev");
          sev.innerHTML = msg["data"]["seven_chou"];

          var sevn = document.getElementById("sevn");
          sevn.innerHTML = msg["data"]["seven_num"];
        },
      });

      //未签次数多的学生
      $.ajax({
        type: "POST",
        url: "index.php?s=index/welcome/get_more",
        async: false,
        success: function (msg) {
          let bd = document.getElementsByName("more")[0];
          if (msg.count == 0) {
            let div1 = document.createElement("div");
            let div2 = document.createElement("div");

            div1.className = "layuimini-notice";
            div2.className = "layuimini-notice-title";

            div2.innerHTML = msg.data;

            div1.appendChild(div2);
            bd.appendChild(div1);
          } else {
            for (var i = 0; i < msg.count; i++) {
              let div1 = document.createElement("div");
              let div2 = document.createElement("div");
              let div3 = document.createElement("div");
              let sp = document.createElement("span");

              div1.className = "layuimini-notice";
              div2.className = "layuimini-notice-title";
              div3.className = "layuimini-notice-extra";

              div2.innerHTML =
                msg[i]["student_id"] + "  " + msg[i]["username"];

              if (msg[i]["num"] < 10) {
                sp.style.marginLeft = "7px";
              }
              div3.innerHTML = "未签次数：";
              sp.innerHTML = msg[i]["num"];

              div3.appendChild(sp);
              div1.appendChild(div3);
              div1.appendChild(div2);
              bd.appendChild(div1);
            }
          }
        },
      });

      /**
       * 查看未签名单
       **/
      $("body").on("click", "#div1", function () {
        var title = $(this).children("#div2").text(),
          noticeTime = $(this).children("#div3").text(),
          content = $(this).children("#div4").html();
        var html =
          '<div style="padding:15px 20px; text-align:justify; line-height: 22px;border-bottom:1px solid #e2e2e2;background-color: white;color: black">\n' +
          '<div style="text-align: center;margin-bottom: 20px;font-weight: bold;border-bottom:1px solid #718fb5;padding-bottom: 5px"><h4 class="text-danger">' +
          noticeTime +
          "</h4></div>\n" +
          '<div style="font-size: 12px">' +
          content +
          "</div>\n" +
          "</div>\n";
        parent.layer.open({
          type: 1,
          title:
            '<span style="font-size: 12px;color: black;margin-top: 1px">' +
            title +
            "</span>",
          area: "300px;",
          shade: 0.8,
          id: "layuimini-notice",
          moveType: 1,
          content: html,
          success: function (layero) {
            var btn = layero.find(".layui-layer-btn");
            btn.find(".layui-layer-btn0").attr({
              href: "https://gitee.com/zhongshaofa/layuimini",
              target: "_blank",
            });
          },
        });
      });

      $.ajax({
        type: "POST",
        url: "index.php?s=index/welcome/get_time",
        async: false,
        success: function (msg) {
          let bd = document.getElementsByName("records")[0];

          if (msg.count == 0) {
            let div1 = document.createElement("div");
            let div2 = document.createElement("div");
            let div3 = document.createElement("div");
            let div4 = document.createElement("div");

            div1.className = "layuimini-notice";
            div2.className = "layuimini-notice-title";
            div3.className = "layuimini-notice-extra";
            div4.className = "layuimini-notice-content layui-hide";
            div1.setAttribute("id", "div1");
            div2.setAttribute("id", "div2");
            div3.setAttribute("id", "div3");
            div4.setAttribute("id", "div4");

            div1.title = "点击查看详情";

            div2.innerHTML = msg.date;
            div3.innerHTML = msg.data;
            div4.innerHTML = "";

            div1.appendChild(div4);
            div1.appendChild(div3);
            div1.appendChild(div2);
            bd.appendChild(div1);
          } else {
            for (var k = 0; k < msg.count; k++) {
              let div1 = document.createElement("div");
              let div2 = document.createElement("div");
              let div3 = document.createElement("div");
              let div4 = document.createElement("div");

              div1.className = "layuimini-notice";
              div2.className = "layuimini-notice-title";
              div3.className = "layuimini-notice-extra";
              div4.className = "layuimini-notice-content layui-hide";
              div1.setAttribute("id", "div1");
              div2.setAttribute("id", "div2");
              div3.setAttribute("id", "div3");
              div4.setAttribute("id", "div4");

              div1.title = "点击查看详情";
              div2.innerHTML = msg.data[k].start_time.split(" ")[0];
              div3.innerHTML =
                msg.data[k].start_time.split(" ")[1] +
                " - " +
                msg.data[k].end_time.split(" ")[1];

              $.ajax({
                type: "POST",
                url: "index.php?s=index/welcome/get_records",
                async: false,
                data: {
                  start_time: msg.data[k].start_time,
                  end_time: msg.data[k].end_time,
                },
                success: function (msg) {
                  if (msg.count == 0) {
                    let div5 = document.createElement("div");
                    div5.style.textAlign = "center";
                    div5.innerHTML = msg.data;
                    div4.appendChild(div5);
                  } else {
                    let table = document.createElement("table");
                    let thead = document.createElement("thead");
                    let tr = document.createElement("tr");
                    let th1 = document.createElement("th");
                    let th2 = document.createElement("th");

                    table.className = "layui-table";

                    th1.innerHTML = "宿舍";
                    th2.innerHTML = "学号";

                    th1.style.textAlign = "center";
                    th2.style.textAlign = "center";

                    tr.appendChild(th1);
                    tr.appendChild(th2);
                    thead.appendChild(tr);
                    table.appendChild(thead);

                    for (var m = 0; m < msg.count; m++) {
                      let tr = document.createElement("tr");
                      let td2 = document.createElement("td");

                      var c = 1;
                      for (var n = m + 1; n < msg.count; n++) {
                        if (msg.data[m].dorm_num == msg.data[n].dorm_num) {
                          c++;
                          msg.data[n].dorm_num = "same";
                        }
                      }

                      if (msg.data[m].dorm_num != "same") {
                        let td1 = document.createElement("td");
                        td1.innerHTML = msg.data[m].dorm_num;
                        td1.rowSpan = c;
                        tr.appendChild(td1);
                        td1.style.fontWeight = "normal";
                        td1.style.textAlign = "center";
                      }

                      td2.innerHTML = msg.data[m].id;
                      td2.style.fontWeight = "normal";
                      td2.style.textAlign = "center";

                      tr.appendChild(td2);
                      table.appendChild(tr);
                      div4.appendChild(table);
                    }
                  }
                },
              });
              div1.appendChild(div4);
              div1.appendChild(div3);
              div1.appendChild(div2);
              bd.appendChild(div1);
            }
          }
        },
      });

      var xAxis = []; //横坐标
      var days_dorm = []; //抽取总数（宿舍）
      var days_stu = []; //抽取总数（学生）
      var days_unsgdorm = []; //未签到（宿舍）
      var days_unsgstu = []; //未签到（学生）
      var days_sgdorm = []; //已签到（宿舍）
      var days_sgstu = []; //已签到（学生）
      $.ajax({
        type: "POST",
        url: "index.php?s=index/welcome/get_line",
        async: false,
        dataType: "json", //返回数据形式为json
        success: function (msg) {
          for (var i = 0; i < 7; i++) {
            var str = msg.data.weekday[i]["date"].split("-");
            var str = str[1] + "/" + str[2];
            xAxis.push(msg.data.weekday[i]["week"] + " " + str); //挨个取出并填入数组
          }

          if (msg.data.hasOwnProperty("days")) {
            for (var i = 0, j = 0; i < 7; i++) {
              if (
                j < msg.data.days.length &&
                msg.data.weekday[i]["date"] == msg.data.days[j]["start_time"]
              ) {
                days_dorm.push(msg.data.days[j]["dorm_count"]); //挨个取出并填入数组
                days_stu.push(msg.data.days[j]["stu_count"]);
                j++;
              } else {
                days_dorm.push(0);
                days_stu.push(0);
              }
            }

            for (var i = 0, j = 0; i < 7; i++) {
              if (
                j < msg.data.days_unsign.length &&
                msg.data.weekday[i]["date"] ==
                msg.data.days_unsign[j]["start_time"]
              ) {
                days_unsgdorm.push(msg.data.days_unsign[j]["dorm_count"]); //挨个取出并填入数组
                days_unsgstu.push(msg.data.days_unsign[j]["stu_count"]);
                j++;
              } else {
                days_unsgdorm.push(0);
                days_unsgstu.push(0);
              }
            }

            for (var i = 0, j = 0; i < 7; i++) {
              if (
                j < msg.data.days_sign.length &&
                msg.data.weekday[i]["date"] ==
                msg.data.days_sign[j]["start_time"]
              ) {
                days_sgdorm.push(msg.data.days_sign[j]["dorm_count"]); //挨个取出并填入数组
                days_sgstu.push(msg.data.days_sign[j]["stu_count"]);
                j++;
              } else {
                days_sgdorm.push(0);
                days_sgstu.push(0);
              }
            }
          }
        },
      });

      /**
       * 报表功能
       */
      var echartsRecords = echarts.init(
        document.getElementById("echarts-records"),
        "walden"
      );
      var optionRecords = {
        tooltip: {
          trigger: "axis",
        },
        legend: {
          data: [
            "抽取宿舍数",
            "已签到宿舍数",
            "未签到宿舍数",
            "抽取学生数",
            "已签到学生数",
            "未签到学生数",
          ],
        },
        grid: {
          left: "3%",
          right: "4%",
          bottom: "3%",
          containLabel: true,
        },
        toolbox: {
          feature: {
            saveAsImage: {},
          },
        },
        xAxis: {
          type: "category",
          boundaryGap: false,
          // data: ["周一", "周二", "周三", "周四", "周五", "周六", "周日"],
          data: xAxis.map(function (str) {
            return str.replace(" ", "\n");
          }),
        },
        yAxis: {
          type: "value",
        },
        series: [
          {
            name: "抽取宿舍数",
            type: "line",
            data: days_dorm,
          },
          {
            name: "已签到宿舍数",
            type: "line",
            data: days_sgdorm,
          },
          {
            name: "未签到宿舍数",
            type: "line",
            data: days_unsgdorm,
          },
          {
            name: "抽取学生数",
            type: "line",
            data: days_stu,
          },
          {
            name: "已签到学生数",
            type: "line",
            data: days_sgstu,
          },
          {
            name: "未签到学生数",
            type: "line",
            data: days_unsgstu,
          },
        ],
      };

      echartsRecords.setOption(optionRecords);

      // echarts 窗口缩放自适应
      window.onresize = function () {
        echartsRecords.resize();
      };
    });
  </script>
</body>

</html>