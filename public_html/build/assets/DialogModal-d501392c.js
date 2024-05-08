import{S as w}from"./SectionTitle-b8175edb.js";import{o as y,e as p,b as c,w as n,r as o,a as s,A as x,x as v,E as g,l as _,c as h,m as r,T as m,G as u,n as b,f as $,H as k}from"./app-bf092d1c.js";const B={class:"md:grid md:grid-cols-3 md:gap-6"},S={class:"mt-5 md:mt-0 md:col-span-2"},C={class:"px-4 py-5 sm:p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg"},G={__name:"ActionSection",setup(e){return(a,t)=>(y(),p("div",B,[c(w,null,{title:n(()=>[o(a.$slots,"title")]),description:n(()=>[o(a.$slots,"description")]),_:3}),s("div",S,[s("div",C,[o(a.$slots,"content")])])]))}},E={class:"fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50","scroll-region":""},W=s("div",{class:"absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"},null,-1),T=[W],M={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(e,{emit:a}){const t=e;x(()=>t.show,()=>{t.show?document.body.style.overflow="hidden":document.body.style.overflow=null});const l=()=>{t.closeable&&a("close")},i=d=>{d.key==="Escape"&&t.show&&l()};v(()=>document.addEventListener("keydown",i)),g(()=>{document.removeEventListener("keydown",i),document.body.style.overflow=null});const f=_(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[t.maxWidth]);return(d,D)=>(y(),h(k,{to:"body"},[c(m,{"leave-active-class":"duration-200"},{default:n(()=>[r(s("div",E,[c(m,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:n(()=>[r(s("div",{class:"fixed inset-0 transform transition-all",onClick:l},T,512),[[u,e.show]])]),_:1}),c(m,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:n(()=>[r(s("div",{class:b(["mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto",f.value])},[e.show?o(d.$slots,"default",{key:0}):$("",!0)],2),[[u,e.show]])]),_:3})],512),[[u,e.show]])]),_:3})]))}},N={class:"px-6 py-4"},V={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},z={class:"mt-4 text-sm text-gray-600 dark:text-gray-400"},A={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-right"},H={__name:"DialogModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(e,{emit:a}){const t=()=>{a("close")};return(l,i)=>(y(),h(M,{show:e.show,"max-width":e.maxWidth,closeable:e.closeable,onClose:t},{default:n(()=>[s("div",N,[s("div",V,[o(l.$slots,"title")]),s("div",z,[o(l.$slots,"content")])]),s("div",A,[o(l.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}};export{M as _,G as a,H as b};
