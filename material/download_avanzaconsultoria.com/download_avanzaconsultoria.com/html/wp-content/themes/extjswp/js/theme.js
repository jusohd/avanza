Ext.namespace('Wp');
Wp.theme = function() {
    var themeButton, recentCommentsButton;
    // this helps distinguish between menu lever inside mainMenuNested()
    var mainMenuLevel = 0;
    // layout objects
    var layout,innerLayout;
    var theNorth,theSouth,theCenter,theEast;
    var thePosts, theRecent;


    // switches ext theme
    var setTheme = function(theme){
        Ext.util.CSS.swapStyleSheet('theme', Wp.bloginfo.template_url + '/css/' + theme + '.css');
        if (layout) {
            layout.layout();
            innerLayout.layout();
        }
        Ext.state.Manager.clear("theme");
        Ext.state.Manager.set("theme", theme);
    }

    // post click universal handler
    var maskClick = function(e){
        // find the "a" element that was clicked
        var a = e.getTarget('a');
        if (a) {
            // rewrite # to hash postParam
            if (a.href.indexOf('#') != -1) {
                cleanUrl = a.href.substring(0, a.href.indexOf('#'));
                postParam = {hash : a.href.substring(a.href.indexOf('#')+1, a.href.length)};
            } else {
                cleanUrl = a.href;
                postParam = {};
            }
            if( a.rel != 'noajax'
                && cleanUrl.indexOf(Wp.bloginfo.url) == 0 
                && cleanUrl.indexOf('wp-admin') == -1 
                && cleanUrl.indexOf('wp-login') == -1 
                && cleanUrl.indexOf('feed') == -1 
              ){
                e.preventDefault();
                Wp.theme.loadPosts(cleanUrl, postParam);
            } 
            
        }
    };

    // public space
    return {
        // setup layout ;-)
        setupLayout: function() {
            layout = new Ext.BorderLayout(document.body, {
                hideOnLayout: true,
                north: {
                    titlebar: false,
                    split:false,
                    height:49
                },
                center: {
                    margins: {top:0,bottom:0,right:0,left:5},
                    tabPosition: 'top',
                    titlebar:true,
                    closeOnTab: true,
                    resizeTabs: true
                },
                east: {
                    margins: {top:0,bottom:0,right:5,left:0},
                    cmargins: {top:0,bottom:0,right:5,left:5},
                    split:true,
                    showPin: true,
                    titlebar:true,
                    collapsible:true,
                    initialSize: 220,
                    minSize: 220,
                    maxSize: 600
                },
                south: {
                    titlebar: false,
                    split:false,
                    height:20
                }

            });
            innerLayout = new Ext.BorderLayout('panelCenter', {
                north: {
                    split:false,
                    initialSize: 27,
                    collapsible:false,
                    titlebar: false
                },
                center: {
                    closeOnTab: true,
                    titlebar:false
                }
            });
            layout.beginUpdate();
            theNorth = layout.add('north', new Ext.ContentPanel('panelNorth', {
                autoScroll:false
            }));
            theSouth = layout.add('south', new Ext.ContentPanel('panelSouth', {
                autoScroll:false
            }));
            theCenter = layout.add('center', new Ext.NestedLayoutPanel(innerLayout, {
                title: Wp.bloginfo.description
            }));
            innerLayout.beginUpdate();
                theToolbar = innerLayout.add('north', new Ext.ContentPanel('wp-toolbar', {
                    fitToFrame: true,
                    autoScroll:false
                }));
                thePosts = innerLayout.add('center', new Ext.ContentPanel('wp-posts', {
                    title: Wp.bloginfo.title,
                    autoScroll:true,
                    fitToFrame: true
                }));
            innerLayout.restoreState();
            innerLayout.endUpdate(true);
            theEast = layout.add('east', new Ext.ux.Accordion('panelEast', {
                monitorWindowResize:true,
                title:'Sidebar',
                autoScroll:true,
                collapsible: true,
                fitToFrame: true,
                animate:false,
                boxWrap: true,
                fitContainer: true, 
                keepState: true,
                expanding:true,
                fitHeight:true
            }));

            layout.restoreState();
            layout.endUpdate();
        },
        // fill accordion with sidebar content and restore its state
        setupSidebar: function() {
            // setUndockable is neccesary; otherwise panels are not undocable 
            theEast.setUndockable();
            // this gets all elements with widget class and adds them to accordion as panels
            Ext.select('.widget').each(
                function (e) {
                    e.select('.wtitle').each(
                        function (e) {
                            // needed for RSS widget which has link and image as title (I don't like images here...)
                             if (Ext.isIE) {
                                e.dom.innerHTML = e.dom.innerText;
                             } else {
                                e.dom.innerHTML = e.dom.textContent;
                             }
                        }
                    )
                    theEast.add(new Ext.ux.InfoPanel(Ext.getDom(e).id, {
                        icon: Wp.bloginfo.template_url + '/images/icons/page_white_copy.png',
                        autoScroll:true,
                        animate:false
                    }));
                }
            );
            theEast.restoreState();
            // if all panels are collapsed, then expand first one (it's too quick&dirty...)
            var expandedPanels = 0;
            theEast.items.each(
            function(e) {
                if (!e.collapsed)
                    expandedPanels++;
                }
            );
            if (expandedPanels===0) {
                theEast.items.itemAt(0).expand();
            }
        },
        // parepare Comments Form to work without page refresh
        setupCommentsForm: function() {
            var submitBtn = Ext.get('submit');
            var commentsForm = Ext.get('commentform');
            var action = Wp.bloginfo.ajax_comments_url;
             // this should handle errors   
            function postComment() {
                Ext.Ajax.request( {
                    url:action, 
                    form: 'commentform',
                    success: function(response, options) {
                        if (!Ext.get("commentlist"))  {
                            Ext.get("commentsform-container").insertHtml('beforeBegin', '<ol id="commentlist" class="commentlist"></ol>');
                        }
                        commentList = Ext.get("commentlist")
                        commentList.insertHtml('beforeEnd', response.responseText);
                        Ext.get(commentList.dom.lastChild).fadeIn();
                    },
                    failure : function(response, options) {
                        Ext.Msg.alert('Error', response.responseText);
                    }
                });
            }
            submitBtn.on('click', postComment);


        },
        setupMainMenu: function() {
            var mainMenuTb = new Ext.Toolbar('wp-toolbar');
            mainMenuTb.add({
                text:'Home',
                handler: function () {
                    // the '?' at the end is neccesary IE6 does not work without it, why?s
                    this.loadPosts(Wp.bloginfo.url + '?'); 
                    }.createDelegate(this)
                },
                '-'
            );
            
            Ext.select('#wp-tb-items//li').each(function(el) {
                    var l = el.dom.firstChild.href;
                    if(el.query('li').length != 0) {
                        mainMenuLevel = 0;
                        this.mainMenuNested(el, mainMenuTb);
                    } else {
                        mainMenuTb.add({
                            text:el.dom.firstChild.innerHTML,
                            handler: function() { this.loadPosts(l);}.createDelegate(this) });
                    } 
                }.createDelegate(this)
            );
            mainMenuTb.add( new Ext.Toolbar.Fill());

            themeButton = new Ext.menu.Item({
                        cls: 'menu',
                        text: 'ExtJS Theme',
                        menu: [
                            new Ext.menu.CheckItem({
                                cls: 'menu',
                                id: 'aero',
                                text: 'Aero Glass',
                                checked: true,
                                group: 'theme',
                                checkHandler: function(item, checked) {
                                    if (checked) setTheme(item.id);
                                }
                            }),
                            new Ext.menu.CheckItem({
                                cls: 'menu',
                                id: 'vista',
                                text: 'Vista Black',
                                group: 'theme',
                                checkHandler: function(item, checked) {
                                    if (checked) setTheme(item.id);
                                }
                            }),
                            new Ext.menu.CheckItem({
                                cls: 'menu',
                                id: 'gray',
                                text: 'Gray Theme',
                                group: 'theme',
                                checkHandler: function(item, checked) {
                                    if (checked) setTheme(item.id);
                                }
                            }),
                            new Ext.menu.CheckItem({
                                cls: 'menu',
                                id: 'default',
                                text: 'Ext Default',
                                group: 'theme',
                                checkHandler: function(item, checked) {
                                    if (checked) setTheme(item.id);
                                }
                            }),
                            new Ext.menu.CheckItem({
                                cls: 'menu',
                                id: 'galdaka',
                                text: 'Galdaka Theme',
                                group: 'theme',
                                checkHandler: function(item, checked) {
                                    if (checked) setTheme(item.id);
                                }
                            })
                        ]
                    });
            recentCommentsButton = new Ext.menu.CheckItem({
                        cls: 'menu',
                        text: 'Recent Comments',
                        checkHandler: function(item, checked){
                            this.recentComments();
                        }.createDelegate(this)
                    });
            mainMenuTb.add({
                cls: 'menu',
                text: 'Extras',
                menu: [recentCommentsButton, themeButton]
            });
            /*
            mainMenuTb.add(new Ext.Toolbar.Button({
                cls: 'x-btn-icon',
                icon: Wp.bloginfo.template_url + '/images/icons/feed.png',
                tooltip:'Syndicate this site using RSS 2.0',
                handler: function () {
                    location.href = Wp.bloginfo.rss2_url;
                    }
                }
            ));
            */
        },
        mainMenuNested: function(el, toolbar){
            var l = el.dom.firstChild.href;            
            var nestedMenu = new Ext.menu.Menu();
            // on the first mainMenuLevel creates MenuButton(SplitButton) otherwise simple menu item
            if (mainMenuLevel < 1) {
                var btn = new Ext.Toolbar.MenuButton({
                    text:el.dom.firstChild.innerHTML,
                    handler: function() { this.loadPosts(l);}.createDelegate(this),
                    cls:'menu',
                    menu: nestedMenu
                });
            } else {
                var btn = new Ext.menu.Item({
                    text:el.dom.firstChild.innerHTML,
                    handler: function() { this.loadPosts(l);}.createDelegate(this),
                    cls:'menu',
                    icon:Wp.bloginfo.template_url + '/images/icons/page_white_copy.png',
                    menu:nestedMenu
                });
            }
            mainMenuLevel++;
            // iterates through pages lis and creates menu elements
            el.select('//li').each(function (elsub) {
                var l = elsub.dom.firstChild.href;
                if (elsub.query('//li').length != 0 ) {
                    this.mainMenuNested(elsub, nestedMenu);
                } else {
                    nestedMenu.add({
                        text: elsub.dom.firstChild.innerHTML, 
                        handler: function() { this.loadPosts(l);}.createDelegate(this),
                        cls:'menu',
                        icon:Wp.bloginfo.template_url + '/images/icons/page_white_copy.png'
                    }); 
                }
            }.createDelegate(this));
            toolbar.add(btn);
        },
        // Prepare simple livesearch (top-right corner)
        setupLiveSearch: function() {
            var ds = new Ext.data.Store({
                proxy: new Ext.data.HttpProxy({
                    url: Wp.bloginfo.url + '?jsonData=true'
                }),
                reader: new Ext.data.JsonReader({
                    root: 'result',
                    id: 'id'
                }, [
                    {name: 'title', mapping: 'title'},
                    {name: 'id', mapping: 'id'},
                    {name: 'author', mapping: 'author'},
                    {name: 'content', mapping: 'content'}
                ])
            });
        
            // Custom rendering Template
            var resultTpl = new Ext.Template(
                '<div class="search-item">',
                    '<h4>{title}<br /></h4>',
                    '{content}',
                '</div>'
            );
            var search = new Ext.form.ComboBox({
                store: ds,
                minChars: 2,
                resizable:true,
                displayField:'title',
                typeAhead: false,
                emptyText:'Quick search...',
                loadingText: 'Searching...',
                width: 220,
                listWidth : 470,
                grow:true,
                growMin : 500,
                pageSize:0,
                hideTrigger:true,
               	queryParam:'s',
                tpl: resultTpl,
                onSelect: function(record){ // override default onSelect to do redirect
                    this.loadPosts(Wp.bloginfo.url + '?p=' + record.id);
                }.createDelegate(this)
            });
            // apply it to the exsting input element
            search.applyTo('liveseach');
        
        },
        // Loads calendar in background; gets url defined within calendar widget
        loadCalendar: function(url) {
            var c = Ext.get('calendar_wrap');
            c.fadeOut({
                callback : loadCalendarCallback
            });
            function loadCalendarCallback() {
                c.load(url, {backgroundCalendar:true}, function(e) {
                    e.fadeIn();
                });
            }
        },
        // As easy as possible, 1.gets wordpress url, 2.posts it with "backgroundPosts" parameter
        loadPosts: function(url, params) {
            // is something else is active switch activation to tab 0;
            if (innerLayout.getRegion('center').getTabs()) {
                innerLayout.getRegion('center').getTabs().items[0].activate();
            }
            // is params is undefined create params
            if (!params) {
                params = {};
            }
            // put backgroundPosts into params , this paramates calls template without header
            params.backgroundPosts = 'yes';
            Ext.get('wp-posts').load({
                url: url,
                params: params, 
                scripts: true,
                callback: function () {
                    hash = Ext.get(params.hash);
                    if (hash) {
                        //Ext.get(hash).scrollIntoView(thePosts.getEl());
                        thePosts.getEl().scroll("b", Ext.get(hash).getTop() - 105, true);
                    }
                    if (Ext.get('commentform')) {
                        this.setupCommentsForm();
                    }
                    /*
                    postTitleArray = Ext.query('.post-title a');
                    if (postTitleArray.length === 1) {
                        innerLayout.getRegion('center').panels.items[0].setTitle(postTitleArray[0].innerHTML);
                    } else {
                        innerLayout.getRegion('center').panels.items[0].setTitle(Wp.bloginfo.title);
                    }
                    */
                    
                    
                }.createDelegate(this)
            });
        },
        // Opens recent comments as another tab inside center of innerLayout
        recentComments: function() {
            if (!theRecent) {
                theRecent = innerLayout.add('center', new Ext.ContentPanel('wp-recent', {
                    autoCreate:true,
                    closable:false,
                    autoScroll:true,
                    title: 'Recent Comments', 
                    fitToFrame:true,
                    url: '?backgroundRecentComments=true',
                    loadOnce:true
                }));
                theRecent.getEl().on('click', maskClick);
                Ext.state.Manager.set("recent", true);
            } else {
                innerLayout.getRegion('center').remove(innerLayout.getRegion('center').panels.get('wp-recent'), false);
                Ext.state.Manager.clear("recent");
                theRecent = null;
            }
        },
        recentCommentsRefresh: function() {
            innerLayout.getRegion('center').getTabs().items['wp-recent'].activate();
            theRecent.refresh();
        },
        init: function() {
            // qtips & state management
            Ext.QuickTips.init();
            Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
            // taken from ext-doc - desapearing mask
        	var loading = Ext.get('loading');
			var mask = Ext.get('loading-mask');
			mask.setOpacity(.8);
			mask.shift({
				xy:loading.getXY(),
				width:loading.getWidth(),
				height:loading.getHeight(), 
				remove:true,
				duration:1,
				opacity:.3,
				easing:'fadeOut',
				callback : function(){
					loading.fadeOut({duration:.2,remove:true});
				}
			});
            // setup
            this.setupLayout();
            Ext.get('wp-posts').on('click', maskClick);
            theEast.getEl().on('click', maskClick);
            this.setupMainMenu();
            this.setupSidebar();
            this.setupLiveSearch();
            //this.loadPosts(Wp.bloginfo.url + '?' + Wp.bloginfo.wp_query);

            // restore ext theme
            var savedTheme = Ext.state.Manager.get("theme");
            if (savedTheme) {
                themeButton.menu.items.get(savedTheme).setChecked(true);
            }
            //restore recent comments
            var recentOpened = Ext.state.Manager.get("recent");
            if (recentOpened) {
                recentCommentsButton.setChecked(true);
                innerLayout.getRegion('center').getTabs().items[0].activate();
            }
        }
    };
}(); // end of app

// end of file
