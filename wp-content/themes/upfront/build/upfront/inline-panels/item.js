upfrontrjs.define(["scripts/upfront/inline-panels/inline-tooltip"],function(t){var i=Backbone.View.extend({className:"upfront-inline-panel-item",width:28,height:28,icon_class:"upfront-icon-region",initialize:function(t){this.options=t||{},this.label=this.options.label},render_icon:function(){var t="function"==typeof this.icon?this.icon():this.icon;if(t){var i=this,n=t.split(" "),e=["upfront-icon"],o=this.$el.find(".upfront-icon");_.each(n,function(t){e.push(i.icon_class+"-"+t)}),o.length?o.attr("class",e.join(" ")):this.$el.append('<i class="'+e.join(" ")+'" />')}},render_label:function(){var t="function"==typeof this.label?this.label():this.label;if(t){var i=this.$el.find(".upfront-inline-panel-item-label");this.$el.addClass("labeled"),i.length?i.html(t):this.$el.append('<span class="upfront-inline-panel-item-label">'+t+"</span>")}},render_tooltip:function(){var i="function"==typeof this.tooltip?this.tooltip():this.tooltip,n=this;if(i)var i=new t({element:n.$el,content:i,panel:this.panel_type})},render:function(){this.render_icon(),this.render_label(),this.render_tooltip(),this.$el.css({width:this.width,height:this.height}),this.$el.attr("id",this.id),"function"==typeof this.on_render&&this.on_render()},open_modal:function(t,i){if(!this.modal){var n=this,e=this.$el.closest(".upfront-region-container");this.modal=new Upfront.Views.Editor.Modal({to:e,top:60}),this.modal.render(),e.append(this.modal.$el)}return this.listenToOnce(Upfront.Events,"entity:region:deactivated",function(){n.close_modal(!1)}),this.modal.open(t,this,i)},close_modal:function(t){return this.modal.close(t)},remove:function(){this.panel_view=!1}});return i});