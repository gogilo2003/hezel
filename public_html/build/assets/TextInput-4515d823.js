import{d as n,A as d,o as s,e as l}from"./app-4eff2d4a.js";const i=["value"],f={__name:"TextInput",props:{modelValue:String},emits:["update:modelValue"],setup(r,{expose:u}){const e=n(null);return d(()=>{e.value.hasAttribute("autofocus")&&e.value.focus()}),u({focus:()=>e.value.focus()}),(a,o)=>(s(),l("input",{ref_key:"input",ref:e,class:"border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm",value:r.modelValue,onInput:o[0]||(o[0]=t=>a.$emit("update:modelValue",t.target.value))},null,40,i))}};export{f as _};
