import{v as m,d,o as c,e as u,b as o,u as e,w as r,F as p,X as f,a,n as _,g as w,j as g}from"./app-bf092d1c.js";import{A as b}from"./AuthenticationCard-534dbefe.js";import{_ as h}from"./AuthenticationCardLogo-0e56efd2.js";import{_ as x}from"./InputError-f116f9f9.js";import{_ as v}from"./InputLabel-78c92bb7.js";import{_ as y}from"./PrimaryButton-e1a55f0b.js";import{_ as V}from"./TextInput-21513acb.js";import"./_plugin-vue_export-helper-c27b6911.js";const k=a("div",{class:"mb-4 text-sm text-gray-600 dark:text-gray-400"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),C=["onSubmit"],$={class:"flex justify-end mt-4"},z={__name:"ConfirmPassword",setup(A){const s=m({password:""}),t=d(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(B,i)=>(c(),u(p,null,[o(e(f),{title:"Secure Area"}),o(b,null,{logo:r(()=>[o(h)]),default:r(()=>[k,a("form",{onSubmit:g(n,["prevent"])},[a("div",null,[o(v,{for:"password",value:"Password"}),o(V,{id:"password",ref_key:"passwordInput",ref:t,modelValue:e(s).password,"onUpdate:modelValue":i[0]||(i[0]=l=>e(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),o(x,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),a("div",$,[o(y,{class:_(["ml-4",{"opacity-25":e(s).processing}]),disabled:e(s).processing},{default:r(()=>[w(" Confirm ")]),_:1},8,["class","disabled"])])],40,C)]),_:1})],64))}};export{z as default};
