<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\phpstudy_pro\WWW\CQCQ\public/../application/index\view\record\record.html";i:1625986745;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>查寝统计</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Access-Control-Allow-Origin" content="*" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="/cqcq/public/static/lib/layui-v2.5.5/css/layui.css" media="all" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="/cqcq/public/static/css/public.css" media="all"/>
    <style>
      body {
        background-color: #f2f2f2;
        margin: 30px 0px;
        padding-left: 110px;
      }

      .dv {
        width: 950px;
        height: 50px;
      }

      .inputdiv {
        width: 140px;
        display: flex;
        border: 1px solid #009688 !important;
        background-color: #fff;
        margin-left: 20px;
        float: right;
        height: 28px;
      }

      .inp {
        width: 110px;
        height: 28px;
        border: 1px solid lightgray;
        padding-left: 8px;
        border-style: none;
        float: right;
      }

      .date-input-icon {
        color: grey;
        height: 28px;
        line-height: 28px;
        width: 30px;
      }

      .yuan {
        border-radius: 10px;
        width: 950px;
        padding-top: 8px;
        border: 1px solid lightgrey;
        background-color: white;
      }

      .box {
        width: 920px;
        padding: 10px 15px;
        border-bottom: 1px solid lightgrey;
        background-color: white;
      }

      .pb {
        width: 880px;
        height: 20px;
        line-height: 20px;
      }

      #box {
        margin-left: 30px;
        padding: 30px;
        width: 880px;
      }

      table {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid lightgrey;
      }

      table tr {
        height: 30px;
        background-color: #fff;
        font-weight: normal;
      }

      thead {
        font-weight: bold;
      }
    </style>
  </head>

  <body>
    <!-- 右上角 -->
    <div class="dv">
      <div class="layui-btn-group" style="float: right; margin-left: 20px; margin-right: 10px;">
        <button
          type="button"
          id="btn_all"
          class="layui-btn layui-btn-sm"
          onclick="changeAll()" >
          全部
        </button>
      </div>

      <div class="layui-inline" style="float: right; background-color: #009688;">
        <button type="submit" class="layui-btn layui-btn-sm" onclick="search()">
          <i class="layui-icon"></i>搜索
        </button>
      </div>
      <div class="inputdiv">
        <input
          type="text"
          class="inp"
          name="date"
          id="test"
          placeholder="请选择时间"
          lay-verify="title"
        />
        <i class="fa fa-calendar-o date-input-icon"></i>
      </div>
    </div>
    <!-- 查寝记录 -->
    <div class="yuan" name="st_yuan" id="st_yuan"></div>

    <script src="/cqcq/public/static/lib/layui-v2.5.5/layui.js" charset="utf-8"></script>
    <script type="text/javascript">
      function changeAll() {
        location.reload();
      }

      function search() {
        var date = document.getElementById("test").value;
        if (date == "") {
          alert("请选择时间"); //无输入情况
        } else {
          layui.use(["jquery"], function () {
            var $ = layui.jquery;
            var layer = layui.layer;
            $.ajax({
              url: "index.php?s=index/record/search_date",
              data: { date: date },
              type: "Post",
              dataType: "json",
              success: function (msg) {
                // console.log(msg);
                if (!msg) {
                  alert("未搜索到记录"); //无输入情况
                } else {
                  $("#st_yuan").empty();
                  let bd = document.getElementsByName("st_yuan")[0];
                  for (var i = 0; i < msg.count; i++) {
                    let div1 = document.createElement("div");
                    let div2 = document.createElement("div");
                    let d1 = document.createElement("p");
                    let d2 = document.createElement("text");
                    let i1 = document.createElement("i");

                    d1.innerHTML =
                      msg[i].data.start_time + " - " + msg[i].data.end_time;

                    d2.innerHTML = msg[i].msg;
                    if (msg[i].msg == "已结束") {
                      d2.style.color = "#00CC00";
                    } else if (msg[i].msg == "进行中") {
                      d2.style.color = "#0066CC";
                    } else {
                      d2.style.color = "#99CCCC";
                    }

                    div1.className = "box";
                    i1.className = "fa fa-sort-down"; //箭头
                    d1.className = "pd"; //日期
                    div2.className = "content"; //表格

                    d2.style.paddingLeft = "20px";
                    i1.style.float = "right";
                    div2.style.display = "none";
                    div2.setAttribute("id", "content"); ////给div2添加id名

                    //动态添加点击收缩事件
                    div1.addEventListener("click", function (e) {
                      if (div2.style.display == "block") {
                        div2.style.display = "none";
                      } else {
                        div2.style.display = "block";
                      }
                    });

                    // 构建表格
                    $.ajax({
                      type: "POST",
                      url: "index.php?s=index/record/dorm",
                      async: false,
                      data: {
                        start_time: msg[i].data.start_time,
                        end_time: msg[i].data.end_time,
                      },
                      success: function (msg) {
                        // console.log(msg);
                        let table = document.createElement("table");
                        let thead = document.createElement("thead");
                        let tr = document.createElement("tr");
                        let th1 = document.createElement("th");
                        let th2 = document.createElement("th");
                        let th3 = document.createElement("th");

                        table.className = "layui-table";
                        table.id = "table1";

                        th1.style.textAlign = "center";
                        th2.style.textAlign = "center";
                        th3.style.textAlign = "center";

                        th1.innerHTML = "宿舍";
                        th2.innerHTML = "学号";
                        th3.innerHTML = "签到情况";

                        tr.appendChild(th1);
                        tr.appendChild(th2);
                        tr.appendChild(th3);
                        thead.appendChild(tr);
                        table.appendChild(thead);
                        div2.appendChild(table);
                        for (var m = 0; m < msg.count; m++) {
                          let tr = document.createElement("tr");
                          let td2 = document.createElement("td");
                          let td3 = document.createElement("td");

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
                          }

                          td2.innerHTML = msg.data[m].id;
                          if (msg.data[m].sign == 0) {
                            td3.innerHTML = "未签到";
                            td3.style.color = "#FF6666";
                          } else {
                            td3.innerHTML = "已签到";
                            td3.style.color = "#CCCCCC";
                          }

                          td2.style.fontWeight = "normal";
                          td3.style.fontWeight = "normal";

                          tr.appendChild(td2);
                          tr.appendChild(td3);
                          table.appendChild(tr);
                        }
                      },
                    });

                    d1.appendChild(i1);
                    d1.appendChild(d2);
                    div1.appendChild(d1);
                    div1.appendChild(div2);
                    bd.appendChild(div1);
                  }
                }
              },
            });
          });
        }
      }

      layui.use(["jquery", "laypage", "laydate", "layer"], function () {
        var layer = layui.layer;
        var laydate = layui.laydate;
        var laypage = layui.laypage;

        //执行一个laydate实例
        laydate.render({
          elem: "#test", //指定元素
          eventElem: ".date-input-icon",
          trigger: "click",
        });
        var $ = layui.jquery;

        $.ajax({
          type: "POST",
          url: "index.php?s=index/record/get_date",
          async: false,
          success: function (msg) {
            window.localStorage.num = msg.count;
            let bd = document.getElementsByName("st_yuan")[0];
            layer.msg('最近' + msg.count + '次查寝记录');
            for (var i = 0; i < msg.count; i++) {
              // console.log(msg[i].data);
              let div1 = document.createElement("div");
              let div2 = document.createElement("div");
              let d1 = document.createElement("p");
              let d2 = document.createElement("text");
              let i1 = document.createElement("i");

              d1.innerHTML =
                msg[i].data.start_time + " - " + msg[i].data.end_time;

              d2.innerHTML = msg[i].msg;
              if (msg[i].msg == "已结束") {
                d2.style.color = "#00CC00";
              } else if (msg[i].msg == "进行中") {
                d2.style.color = "#0066CC";
              } else {
                d2.style.color = "#99CCCC";
              }

              div1.setAttribute("id", "test1");

              div1.className = "box";
              i1.className = "fa fa-sort-down"; //箭头
              d1.className = "pd"; //日期
              div2.className = "content"; //表格

              d2.style.paddingLeft = "20px";
              i1.style.float = "right";
              div2.style.display = "none";
              div2.setAttribute("id", "content"); ////给div2添加id名

              //动态添加点击收缩事件
              div1.addEventListener("click", function (e) {
                if (div2.style.display == "block") {
                  div2.style.display = "none";
                } else {
                  div2.style.display = "block";
                }
              });

              // 构建表格
              $.ajax({
                type: "POST",
                url: "index.php?s=index/record/dorm",
                async: false,
                data: {
                  start_time: msg[i].data.start_time,
                  end_time: msg[i].data.end_time,
                },
                success: function (msg) {
                  //   console.log(msg);
                  let table = document.createElement("table");
                  let thead = document.createElement("thead");
                  let tr = document.createElement("tr");
                  let th1 = document.createElement("th");
                  let th2 = document.createElement("th");
                  let th3 = document.createElement("th");
                  let th4 = document.createElement("th");
                  

                  table.className = "layui-table";
                  table.id = "table1";

                  th1.style.textAlign = "center";
                  th2.style.textAlign = "center";
                  th3.style.textAlign = "center";
                  th4.style.textAlign = "center";


                  th1.innerHTML = "宿舍";
                  th2.innerHTML = "学号";
                  th3.innerHTML = "姓名";
                  th4.innerHTML = "签到情况";


                  tr.appendChild(th1);
                  tr.appendChild(th2);
                  tr.appendChild(th3);
                  tr.appendChild(th4);
                  thead.appendChild(tr);
                  table.appendChild(thead);
                  div2.appendChild(table);

                  for (var m = 0; m < msg.count; m++) {
                    let tr = document.createElement("tr");
                    let td2 = document.createElement("td");
                    let td3 = document.createElement("td");
                    let td4 = document.createElement("td");


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
                    }

                    td2.innerHTML = msg.data[m].id;
                    td3.innerHTML = msg.data[m].username;
                    if (msg.data[m].sign == 0) {
                      td4.innerHTML = "未签到";
                      td4.style.color = "#FF6666";
                    } else {
                      td4.innerHTML = "已签到";
                      td4.style.color = "#CCCCCC";
                    }

                    td2.style.fontWeight = "normal";
                    td3.style.fontWeight = "normal";
                    td4.style.fontWeight = "normal";

                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td4);
                    table.appendChild(tr);
                  }
                },
              });

              d1.appendChild(i1);
              d1.appendChild(d2);
              div1.appendChild(d1);
              div1.appendChild(div2);
              bd.appendChild(div1);
            }

          },
        });

        
      });
    </script>
  </body>
</html>
