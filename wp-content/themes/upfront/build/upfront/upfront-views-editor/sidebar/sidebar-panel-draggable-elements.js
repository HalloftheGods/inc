!function(e){var t=Upfront.Settings&&Upfront.Settings.l10n?Upfront.Settings.l10n.global.views:Upfront.mainData.l10n.global.views;upfrontrjs.define(["scripts/upfront/upfront-views-editor/sidebar/sidebar-panel","scripts/upfront/upfront-views-editor/sidebar/sidebar-panel-settings-section-layout-elements","scripts/upfront/upfront-views-editor/sidebar/sidebar-panel-settings-section-data-elements","scripts/upfront/upfront-views-editor/sidebar/sidebar-panel-settings-section-plugins-elements"],function(s,n,i,o){return s.extend({className:"sidebar-panel sidebar-panel-elements",initialize:function(){this.active=!0,this.sections=_([new n({model:this.model}),new i({model:this.model}),new o({model:this.model})]),this.reset_modules||(this.reset_modules=_.debounce(this._reset_modules,500)),this.elements=_([]),Upfront.Events.on("command:layout:save",this.on_save,this),Upfront.Events.on("command:layout:save_as",this.on_save,this),Upfront.Events.on("command:layout:publish",this.on_save,this),Upfront.Events.on("command:layout:save_success",this.on_save_after,this),Upfront.Events.on("command:layout:save_error",this.on_save_after,this),Upfront.Events.on("entity:drag_stop",this.reset_modules,this),Upfront.Events.on("layout:render",this.apply_state_binding,this)},get_title:function(){return t.draggable_elements},on_save:function(){var e=this.model.get("regions");this._shadow_region=e.get_by_name("shadow"),e.remove(this._shadow_region,{silent:!0})},on_preview:function(){return this.on_save()},apply_state_binding:function(){Upfront.Events.on("command:undo",this.reset_modules,this),Upfront.Events.on("command:redo",this.reset_modules,this)},on_render:function(){var e=this;this.reset_modules||(this.reset_modules=_.debounce(this._reset_modules,500)),this.reset_modules(),!1===Upfront.plugins.isForbiddenByPlugin("toggle first sidebar panel")&&setTimeout(function(){e.$el.find(".sidebar-panel-title").trigger("click")},100)},on_save_after:function(){var e=this.model.get("regions");this._shadow_region?e.add(this._shadow_region,{silent:!0}):this.reset_modules()},get_elements:function(){var e=[];return this.sections&&this.sections.each(function(t){t.elements.size()&&e.push(t.elements.value())}),_(_.flatten(e))},update_sections:function(){if(this.sections){var e=this,t=0;this.sections.each(function(s){s.elements&&s.elements.size()>0?t++:(e.$el.find(".sidebar-panel-tabspane [data-target="+s.cid+"]").hide(),e.$el.find(".sidebar-panel-content #"+s.cid).hide())}),t<=1?this.$el.find(".sidebar-panel-tabspane").addClass("sidebar-panel-tabspane-hidden"):this.$el.find(".sidebar-panel-tabspane").removeClass("sidebar-panel-tabspane-hidden")}},elements_are_initialized:function(e){return e.size()>0},_reset_modules:function(){var t=this.model.get("regions"),s=!!t&&t.get_by_name("shadow"),n=this.get_elements();if(!1!==this.elements_are_initialized(n)){if(this.update_sections(),!t)return!1;if(s||(s=new Upfront.Models.Region({name:"shadow",container:"shadow",title:"Shadow Region"}),this.model.get("regions").add(s)),s.get("modules").length!==n.size()){var i=this,o=s.get("modules");n.each(function(e){var t=!1;o.forEach(function(s){s.get("shadow")==e.shadow_id&&(t=!0)}),t||e.add_element()},i),e("#elements_panel_temp_overlay").remove()}}}})})}(jQuery);