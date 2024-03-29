<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AllowedUsername implements Rule
{
    /**
     * List of disallowed usernames
     * @link https://raw.githubusercontent.com/dsignr/disallowed-usernames/master/disallowed%20usernames.csv
     */
    protected $disallowed = 'json,rss,wellknown,xml,about,abuse,access,account,accounts,activate,ad,add,address,adm,admin,administration,administrator,ads,adult,advertising,affiliate,affiliates,ajax,analytics,android,anon,anonymous,api,app,apps,archive,atom,auth,authentication,avatar,backup,bad,banner,banners,best,beta,billing,bin,blackberry,blog,blogs,board,bot,bots,business,cache,calendar,campaign,career,careers,cart,cdn,cgi,chat,chef,client,clients,code,codes,commercial,compare,config,connect,contact,contact-us,contest,cookie,corporate,create,crossdomain,crossdomain.xml,css,customer,dash,dashboard,data,database,db,delete,demo,design,designer,dev,devel,developer,developers,development,dir,directory,dmca,doc,docs,documentation,domain,download,downloads,ecommerce,edit,editor,email,embed,enterprise,facebook,faq,favorite,favorites,favourite,favourites,feed,feedback,feeds,file,files,follow,font,fonts,forum,forums,free,ftp,gadget,gadgets,games,gift,good,google,group,groups,guest,help,helpcenter,home,homepage,host,hosting,hostname,html,http,httpd,https,image,images,imap,img,index,indice,info,information,intranet,invite,ipad,iphone,irc,java,javascript,job,jobs,js,json,knowledgebase,legal,license,list,lists,log,login,logout,logs,mail,manager,manifesto,marketing,master,me,media,message,messages,messenger,mine,mob,mobile,msg,must,mx,my,mysql,name,named,net,network,new,newest,news,newsletter,notes,oembed,old,oldest,online,operator,order,orders,page,pager,pages,panel,password,perl,photo,photos,php,pic,pics,plan,plans,plugin,plugins,pop,pop3,post,postfix,postmaster,posts,press,pricing,privacy,privacy-policy,profile,project,projects,promo,pub,public,python,random,recipe,recipes,register,registration,remove,request,reset,robots,robots.txt,rss,root,ruby,sale,sales,sample,samples,save,script,scripts,search,secure,security,send,service,services,setting,settings,setup,shop,shopping,signin,signup,site,sitemap,sitemap.xml,sites,smtp,sql,ssh,stage,staging,start,stat,static,stats,status,store,stores,subdomain,subscribe,support,surprise,svn,sys,sysop,system,tablet,tablets,talk,task,tasks,tech,telnet,terms,terms-of-use,test,test1,test2,test3,tests,theme,themes,tmp,todo,tools,top,trust,tv,twitter,twittr,unsubscribe,update,upload,url,usage,user,username,users,video,videos,visitor,web,weblog,webmail,webmaster,website,websites,welcome,wiki,win,ww,wws,www,www1,www2,www3,www4,www5,www6,www7,wwws,wwww,xml,xpg,xxx,yahoo,you,yourdomain,yourname,yoursite,yourusername,modelrocketsspace,modelrocketspace';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->disallowed = collect(explode(',', $this->disallowed));
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (!$this->disallowed->contains($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'That username is not allowed, please try something else.';
    }
}
