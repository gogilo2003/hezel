import{l as s,m as n,p as u,o as l,e as i}from"./app-bf092d1c.js";const p=["value"],g={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{type:String,default:null}},emits:["update:checked"],setup(e,{emit:r}){const c=e,o=s({get(){return c.checked},set(a){r("update:checked",a)}});return(a,t)=>n((l(),i("input",{"onUpdate:modelValue":t[0]||(t[0]=d=>o.value=d),type:"checkbox",value:e.value,class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"},null,8,p)),[[u,o.value]])}};export{g as _};
