import {useAuth} from '@/stores/auth.js';

export default async function routes(to, from, next){
    if(to.meta?.auth){
        const auth = useAuth();
        if(auth.token && auth.user){
    
          const isAuthenticated = await auth.checkToken(auth.token);
          
          console.log(isAuthenticated);
    
          if(isAuthenticated){
            if(to.meta?.admin){
              if(await auth.isAdmin){
                next();
              }else{
                next({name: 'home'});
                console.log("Voce precisa ser administrador!");
              }
            }else{
              next();
            }
          }else{
            next({name: 'home'});
          }
        }else{
          next({name: 'login'});
        }
        console.log(to.name);
    }else{
        next();
    }
}