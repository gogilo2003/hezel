import{i as d,l as f,o as a,c as u,w as b,a as e,b as o,g as h,t as r,e as c,F as m,h as x,u as _,k as y}from"./app-7447c236.js";import{_ as n}from"./Icon-c79dd545.js";import{a as v}from"./Heading.vue_vue_type_script_setup_true_lang-e4bddaf9.js";const g={class:"bg-secondary-default pt-3 pr-5 pb-3 pl-5 absolute top-2 -left-[6px] rounded-tr-3xl z-[2] before:border-t-[0px] before:border-r-[6px] before:border-b-[6px] before:border-l-[0px] before:border-t-transparent before:border-r-[#751814]/50 before:border-b-transparent before:border-l-transparent before:absolute before:left-0 before:-bottom-[6px] before:h-0 before:w-0 before:border-solid"},w={class:"flex text-sm gap-1 items-center text-stone-50"},C=["textContent"],k={class:"text-white"},B={class:"relative z-[1] overflow-hidden h-[18rem]"},F=["src"],N={class:""},E={class:"text-primary-default p-4 relative"},V={class:"flex gap-2 text-secondary-default text-sm text-center md:text-left"},z=["textContent"],I={class:"text-sm text-primary/50 py-3 flex gap-3 flex-wrap items-center"},K={class:"flex gap-2"},S=["textContent"],O=d({__name:"PropertyItem",props:{property:Object},setup(t){const p=t,i=f(()=>p.property.features.filter(s=>s.highlighted));return(s,$)=>(a(),u(_(y),{href:s.route("property",t.property.slug),class:"relative hover:shadow group transition-shadow duration-300 border border-primary/25 h-[30rem]"},{default:b(()=>[e("div",g,[e("div",w,[o(n,{class:"h-4 w-4",type:"home"}),h(" For "),e("span",{textContent:r(t.property.status)},null,8,C)]),e("p",k,r(new Intl.NumberFormat("en-KE",{style:"currency",currency:"KES"}).format(t.property.price)),1)]),e("div",B,[e("img",{class:"group-hover:transform group-hover:scale-125 transition duration-300",src:t.property.picture.thumb??"",alt:"property.picture.caption"},null,8,F)]),e("div",N,[e("div",E,[o(v,{level:"h4",class:"text-xl text-left mb-2 uppercase font-semibold",textContent:r(t.property.title)},null,8,["textContent"]),e("h4",V,[o(n,{class:"h-4",type:"location"}),e("span",{textContent:r(t.property.location)},null,8,z)]),e("div",I,[(a(!0),c(m,null,x(i.value,l=>(a(),c("div",K,[o(n,{class:"h-4",type:l.icon},null,8,["type"]),e("span",{textContent:r(l.value)},null,8,S)]))),256))])])])]),_:1},8,["href"]))}});export{O as _};
