import{i as C,d as w,A as j,c as o,w as i,o as s,b as u,t as f,a as r,e as d,h as m,F as p,u as g,k as x,n as y}from"./app-4eff2d4a.js";import{W as k,C as _}from"./Heading.vue_vue_type_script_setup_true_lang-1e9c3e0a.js";import{_ as L}from"./PropertyItem.vue_vue_type_script_setup_true_lang-6ba4cede.js";import{_ as B}from"./Heading2.vue_vue_type_script_setup_true_lang-f14eb57f.js";import"./_plugin-vue_export-helper-c27b6911.js";const M={class:"bg-white"},$={class:"flex gap-2 items-start md:items-center flex-col justify-center md:justify-start md:flex-row border-b mb-4 pb-4"},F=r("span",{class:"self-center"},"Categories:",-1),H={class:"flex gap-1 flex-wrap justify-center"},N={class:"grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 my-4 gap-8"},P={class:"flex items-center justify-center mt-12"},A=C({__name:"Properties",props:["category","properties","categories"],setup(l){const c=l,n=w("");j(()=>{var t,a;(t=c.category)!=null&&t.data?n.value=`${(a=c.category)==null?void 0:a.data.name}`:n.value="Property Listing"});const b="bg-secondary-400 text-white",v="bg-white text-stone-800",h=t=>{var a;return(t==null?void 0:t.id)===((a=c.category)==null?void 0:a.data.id)?b:v};return(t,a)=>(s(),o(k,{title:n.value},{header:i(()=>[u(_,null,{default:i(()=>[u(B,{class:"uppercase text-2xl font-light",textContent:f(n.value)},null,8,["textContent"])]),_:1})]),default:i(()=>[r("div",M,[u(_,null,{default:i(()=>[r("div",$,[F,r("div",H,[(s(!0),d(p,null,m(l.categories,e=>(s(),o(g(x),{class:y(["py-1 px-3 border border-secondary-400",h(e)]),href:t.route("properties",e.slug),textContent:f(e.name)},null,8,["class","href","textContent"]))),256))])]),r("div",N,[(s(!0),d(p,null,m(l.properties.data,e=>(s(),o(L,{property:e},null,8,["property"]))),256))]),r("div",P,[(s(!0),d(p,null,m(l.properties.meta.links,e=>(s(),o(g(x),{href:e.url,as:e.url?"a":"span",disabled:!e.url,innerHTML:e.label,class:y(["p-2 h-8 min-w-[2rem] flex items-center justify-center",{"text-primary":!!(e.url&&!e.active),"text-gray-400":!e.url&&!e.active,"text-secondary-default font-semibold":e.active}])},null,8,["href","as","disabled","innerHTML","class"]))),256))])]),_:1})])]),_:1},8,["title"]))}});export{A as default};
