// pages/chakan/chakan.js
var page = getApp().globalData.page; //页
var count = 0; //一次加载记录数量
var totalCount = 0; //总记录数
var flag = 0; //0开 1锁
var scrollHeight = 0; //记录块高度
var scrollTop = 0;
var oneScrollHeight = 0; //一个记录块高度
Page({
    /**
     * 页面的初始数据
     */
    data: {
        showData: [],
        dateValue: " - - ",
        department: '',
        grade: '',
        isShowLoadmore: false, //正在加载 
        isShowNoDatasTips: false, //暂无数据
        isShow: false,
        isShowing: true, //搜索开启
        isScroll: true, //启用滚动
    },

    datePickerBindchange: function (e) {
        this.setData({
            dateValue: e.detail.value
        })
    },

    //搜索记录
    onSearch: function (e) {
        var that = this
        that.setData({
            isScroll: true
        })
        wx.request({
            url: getApp().globalData.server + '/cqcq/public/index.php/api/Checkresults/specifiedDate',
            data: {
                department: that.data.department,
                grade: that.data.grade,
                date: that.data.dateValue
            },
            method: "POST",
            header: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            success: function (res) {
                if (res.data.error_code == 1) {
                    wx.showModal({
                        title: '提示！',
                        showCancel: false,
                        content: res.data.msg,
                        success: function (res) { }
                    })
                } else if (res.data.error_code == 2) {
                    wx.showModal({
                        title: '提示！',
                        showCancel: false,
                        content: res.data.msg,
                        success: function (res) { }
                    })
                } else if (res.data.error_code == 0) {
                    that.setData({
                        showData: res.data.data
                    })
                    that.getScrollHeight();
                    count = that.data.showData.length
                    console.log(count);
                    if (count < 7) {
                        if (count * oneScrollHeight < scrollHeight) { //记录块不超过页面高度
                            console.log('count * oneScrollHeight', count * oneScrollHeight);
                            console.log('scrollHeight', scrollHeight);
                            that.setData({
                                isScroll: false //禁用滚动
                            })
                        } else {
                            that.setData({
                                isScroll: true //允许滚动
                            })
                            flag = 1;
                        }
                    } else if (count >= 7) {
                        that.setData({
                            isScroll: true //允许滚动
                        })
                        flag = 1;
                    }
                    console.log(that.data.showData)
                }
            },
            fail: function (res) {
                wx.showModal({
                    title: '哎呀～',
                    content: '网络不在状态呢！',
                    success: function (res) {
                        if (res.confirm) {
                            console.log('用户点击确定')
                        } else if (res.cancel) {
                            console.log('用户点击取消')
                        }
                    }
                })
            },
            complete: function (res) {
                wx.hideLoading()
            }
        })
    },
    
    //全部记录
    onAll: function (options) {
        console.log("onALL")
        this.setData({
            showData: [],
            isScroll: true
        })
        getApp().globalData.page = 2
        console.log("onLoad")
        this.onLoad();
    },

    //获取全部记录
    getList: function (page) {
        //获取当前时间戳  
        var timestamp = Date.parse(new Date());
        timestamp = timestamp / 1000;
        //获取当前时间  
        var n = timestamp * 1000;
        var date = new Date(n);
        //年  
        var Y = date.getFullYear();
        //月  
        var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1);
        //日  
        var D = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
        //时  
        var h = date.getHours();
        if (h < 10) {
            h = '0' + h
        }
        //分  
        var m = date.getMinutes();
        if (m < 10) {
            m = '0' + m
        }
        //秒  
        var s = date.getSeconds();
        if (s < 10) {
            s = '0' + s
        }
        console.log("当前时间：" + Y + "-" + M + "-" + D + " " + h + ":" + m + ":" + s);
        var time = Y + "-" + M + "-" + D + " " + h + ":" + m + ":" + s;
        this.setData({
            time: time
        })
        console.log(this.data.time)
        this.setData({
            grade: getApp().globalData.user.grade,
            department: getApp().globalData.user.department,
            isScroll: true
        })
        var that = this
        // wx.showLoading({
        //     title: '加载中',
        // })
        wx.request({
            url: getApp().globalData.server + '/cqcq/public/index.php/api/Checkresults/checkRecords',
            data: {
                department: that.data.department,
                grade: that.data.grade,
                page: page
            },
            method: "POST",
            header: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            success: function (res) {
                that.setData({
                    isShowLoadmore: true,
                    isShowNoDatasTips: false,
                })
                if (res.data.error_code == 1) {
                    wx.showModal({
                        title: '提示！',
                        showCancel: false,
                        content: res.data.msg,
                        success: function (res) { }
                    })
                } else if (res.data.error_code == 2) {
                    // wx.showModal({
                    //   title: '提示！',
                    //   showCancel: false,
                    //   content: res.data.msg,
                    //   success: function (res) {}
                    // })
                    that.setData({
                        isShowLoadmore: false, // 不显示正在加载
                        isShowNoDatasTips: true, // 显示暂无数据
                    })
                    if (totalCount == 0) {
                        that.setData({
                            isShow: true, //显示图片
                            isShowing: false,  //不显示搜索
                            isShowNoDatasTips: false,
                        })
                    }
                } else if (res.data.error_code != 0) {
                    wx.showModal({
                        title: '哎呀～',
                        content: '出错了呢！' + res.data.msg,
                        success: function (res) {
                            if (res.confirm) {
                                console.log('用户点击确定')
                            } else if (res.cancel) {
                                console.log('用户点击取消')
                            }
                        }
                    })
                } else if (res.data.error_code == 0) {
                    //懒加载
                    console.log(that.data.showData)
                    getApp().globalData.page += 1;
                    if (res.data.data.length > 0) {
                        that.setData({
                            showData: that.data.showData.concat(res.data.data), //合并数据
                            isShowLoadmore: false,
                            isShowNoDatasTips: false,
                        })
                        count = res.data.data.length;
                        totalCount += count;
                    } else {
                        // that.setData({
                        //     loadMoreText: '没有数据了'
                        // })
                    }
                    console.log(that.data.showData)
                    console.log(res)
                    console.log(res.data.data)
                }
            },
            fail: function (res) {
                wx.showModal({
                    title: '哎呀～',
                    content: '网络不在状态呢！',
                    success: function (res) {
                        if (res.confirm) {
                            console.log('用户点击确定')
                        } else if (res.cancel) {
                            console.log('用户点击取消')
                        }
                    }
                })
            },
            complete: function (res) {
                wx.hideLoading()
            }
        })
        setTimeout(function () {
            wx.hideLoading()
        }, 2000)
    },

    //删除记录
    onLike: function (e) {
        var that = this
        wx.showModal({
            title: '提示',
            content: '您确认将此记录放入回收站？',
            success: function (res) {
                if (res.confirm) {
                    console.log('用户点击确定')
                    wx.request({
                        url: getApp().globalData.server + '/cqcq/public/index.php/api/Checkresults/deleteRecord',
                        data: {
                            department: that.data.department,
                            grade: that.data.grade,
                            start_time: e.target.dataset.time,
                            end_time: e.target.dataset.end_time,
                        },
                        method: "POST",
                        header: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        success: function (res) {
                            if (res.data.error_code == 1) {
                                wx.showModal({
                                    title: '提示！',
                                    showCancel: false,
                                    content: res.data.msg,
                                    success: function (res) { }
                                })
                            } else if (res.data.error_code == 2) {
                                wx.showModal({
                                    title: '提示！',
                                    showCancel: false,
                                    content: res.data.msg,
                                    success: function (res) { }
                                })
                            } else if (res.data.error_code != 0) {
                                wx.showModal({
                                    title: '哎呀～',
                                    content: '出错了呢！' + res.data.msg,
                                    success: function (res) {
                                        if (res.confirm) {
                                            console.log('用户点击确定')
                                        } else if (res.cancel) {
                                            console.log('用户点击取消')
                                        }
                                    }
                                })
                            } else if (res.data.error_code == 0) {
                                wx.showModal({
                                    success: function (res) {
                                        if (res.confirm) {
                                            console.log('用户点击确定')
                                            // that.onLoad()
                                            that.onAll()
                                        } else if (res.cancel) {
                                            console.log('用户点击取消')
                                        }
                                    },
                                    title: '提示',
                                    showCancel: false,
                                    content: '您删除的记录会在回收站中保留31天~',
                                })
                            }
                        },
                        fail: function (res) {
                            wx.showModal({
                                title: '哎呀～',
                                content: '网络不在状态呢！',
                                success: function (res) {
                                    if (res.confirm) {
                                        console.log('用户点击确定')
                                    } else if (res.cancel) {
                                        console.log('用户点击取消')
                                    }
                                }
                            })
                        },
                        complete: function (res) { }
                    })
                } else if (res.cancel) {
                    console.log('用户点击取消')
                }
            }
        })
    },

    //查看跳转
    onClick: function (e) {
        wx.navigateTo({
            url: "../teacher_details/teacher_details?time=" + e.target.dataset.times + "&&endtime=" + e.target.dataset.endtime
        })
    },
    //显示
    onLoad: function (options) {
        // 页面初始化 options为页面跳转所带来的参数
        totalCount = 0;
        var that = this
        getApp().globalData.page = 2
        page = getApp().globalData.page
        flag = 0;
        that.getList(1)
        page += 1
        setTimeout(function () {
            wx.hideLoading()
        }, 100)
        // if (that.getList(1) == '') {
        //   wx.showModal({
        //     title: '提示！',
        //     showCancel: false,
        //     content: '回收站为空'
        //   })
        // }
    },

    getScrollHeight: function () {
        // 页面高度
        wx.createSelectorQuery().select('.scbg').boundingClientRect((rect) => {
            scrollHeight = rect.height
        }).exec()

        // 设定一小块的高度
        wx.createSelectorQuery().select('.changeInfoName').boundingClientRect((rect) => {
            oneScrollHeight = rect.height / (80 / 240)
        }).exec()
    },

    //触底
    onScrollLower: function (e) {
        var that = this;
        if (count == 7) {
            if (flag == 1) {
                that.setData({
                    isScroll: true
                })
            } else {
                flag = 0;
                console.log(page)
                that.setData({
                    isShowLoadmore: true, // 显示正在加载
                    isShowNoDatasTips: false,
                })
                that.getList(page)
                page = getApp().globalData.page + 1;
            }
        } else if (count < 7) {
            if (flag == 1) {
                that.setData({
                    isScroll: true
                })
            } else {
                that.getList(page)
            }
        } else if (count > 7) {
            that.setData({
                isScroll: true
            })
        }
        setTimeout(function () {
            wx.hideLoading()
        }, 80)
    },

    //滚动时
    onPull() {
        var that = this;
        that.setData({
            isShowLoadmore: false, // 显示正在加载
            isShowNoDatasTips: false,
        })
    }
})