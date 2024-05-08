import{v as c,e as f,b as o,u as e,w as l,F as w,o as _,X as g,a as t,n as V,g as b,j as v}from"./app-4eff2d4a.js";import{A as k}from"./AuthenticationCard-5d263f55.js";import{_ as x}from"./AuthenticationCardLogo-7e6d2cb3.js";import{_ as m}from"./InputError-589fa181.js";import{_ as i}from"./InputLabel-6d4cf5b7.js";import{_ as y}from"./PrimaryButton-2b5e5256.js";import{_ as n}from"./TextInput-4515d823.js";import"./_plugin-vue_export-helper-c27b6911.js";const P=["onSubmit"],$={class:"mt-4"},C={class:"mt-4"},S={class:"flex items-center justify-end mt-4"},E={__name:"ResetPassword",props:{email:String,token:String},setup(p){const d=p,s=c({token:d.token,email:d.email,password:"",password_confirmation:""}),u=()=>{s.post(route("password.update"),{onFinish:()=>s.reset("password","password_confirmation")})};return(h,a)=>(_(),f(w,null,[o(e(g),{title:"Reset Password"}),o(k,null,{logo:l(()=>[o(x)]),default:l(()=>[t("form",{onSubmit:v(u,["prevent"])},[t("div",null,[o(i,{for:"email",value:"Email"}),o(n,{id:"email",modelValue:e(s).email,"onUpdate:modelValue":a[0]||(a[0]=r=>e(s).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.email},null,8,["message"])]),t("div",$,[o(i,{for:"password",value:"Password"}),o(n,{id:"password",modelValue:e(s).password,"onUpdate:modelValue":a[1]||(a[1]=r=>e(s).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),t("div",C,[o(i,{for:"password_confirmation",value:"Confirm Password"}),o(n,{id:"password_confirmation",modelValue:e(s).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=r=>e(s).password_confirmation=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.password_confirmation},null,8,["message"])]),t("div",S,[o(y,{class:V({"opacity-25":e(s).processing}),disabled:e(s).processing},{default:l(()=>[b(" Reset Password ")]),_:1},8,["class","disabled"])])],40,P)]),_:1})],64))}};export{E as default};
