import{l as n,o as r,e as i,b as l,w as a,r as e,a as t,j as c,n as p,u as m,f as u,I as g}from"./app-4eff2d4a.js";import{S as _}from"./SectionTitle-3894fbe1.js";const b={class:"md:grid md:grid-cols-3 md:gap-6"},f={class:"mt-5 md:mt-0 md:col-span-2"},h={class:"grid grid-cols-6 gap-6"},v={key:0,class:"flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"},k={__name:"FormSection",emits:["submitted"],setup(y){const o=n(()=>!!g().actions);return(s,d)=>(r(),i("div",b,[l(_,null,{title:a(()=>[e(s.$slots,"title")]),description:a(()=>[e(s.$slots,"description")]),_:3}),t("div",f,[t("form",{onSubmit:d[0]||(d[0]=c(w=>s.$emit("submitted"),["prevent"]))},[t("div",{class:p(["px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow",m(o)?"sm:rounded-tl-md sm:rounded-tr-md":"sm:rounded-md"])},[t("div",h,[e(s.$slots,"form")])],2),m(o)?(r(),i("div",v,[e(s.$slots,"actions")])):u("",!0)],32)])]))}};export{k as _};