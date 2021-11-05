https://www.netgsm.com.tr/dokuman/?language=PHP#soap-servisi-sms-g%C3%B6nderme

    
    API ile SMS göndermek için www.netgsm.com.tr adresinden giriş yaptıktan sonra Kullanıcı İşlemleri / API Talep İşlemleri menüsünden API talebinde bulununuz.

    API servisine erişimde hesabınızda alt kullanıcı tanımlamanız gerekmektedir, Kullancı İşlemleri / Alt Kullanıcı Tanımla menüsü ile oluşturacağınız alt kullanıcıya API servisi yetkilerini verebilirsiniz.

    API ile ilgili teknik değişiklik ve gelişmelerden haberdar olmak için Kullanıcı İşlemleri / API Talep İşlemleri menüsündeki API yetkilisi bölümüne API entegrasyonunu sağlayan kişinin bilgilerini girmeniz gerekmektedir.

    API servisi kullanımına IP adres sınırlaması getirmek için Kullanıcı İşlemleri / API Talep İşlemleri menüsündeki IP Erişimini Sınırla butonunu kullanabilirsiniz.

    SMS'lerinizi 3 yöntemle API servisine teslim edebilirsiniz: SOAP Servisi, XML POST ve HTTP GET metodu.

    Mesaj başlığı kısmına kullanıcı hesabınızda tanımlı gönderici adlarından(mesaj başlığı) birini giriniz. Hesabınızda tanımlı olan gönderici adlarınızı API ile Gönderici Adı Sorgula menüsündeki sorgulama ile listeyebilirsiniz. Ayrıca web ara yüzde Kullanıcı İşlemleri / Gönderici Adı Talep menüsünden de kontrol edebilirsiniz.

    Yurt dışına SMS gönderiminde numara başına '00' eklenmelidir. Örneğin, +421xxxxxxx numarasına 00421xxxxxxx şeklinde gönderim sağlanmalıdır.

    Enter karakterli SMS gönderimlerinde, gönderilen metin içinde string olarak " \n " veya " \\n " karakterleri kullanılmalıdır.

    Ticari Elektronik İleti; Firmaların, mal ve hizmetlerini pazarlamak, işletmesini tanıtmak ya da kutlama ve temenni gibi içeriklerle tanınırlığını artırmak amacıyla tüketicilere kampanya, özel gün kutlaması,indirim, hediye içerikli vb. gönderdiği mesajlardır.

    SMS'lerinizi ticari içerikli iletmek için 3 gönderim yönteminde de göndermeniz gereken zorunlu parametreyi iletmelisiniz.Gönderim yöntemlerinde bu parametre belirtilmiştir. Parametreyi ticari içerikli olarak göndermeniz halinde, gönderdiğiniz mesajlar İleti Yönetim Sistemi (İYS)'den kontrol edilecek ve İYS'de kayıtlı olmayan numaralara mesajlar iletilmeyecektir.Gönderdiğiniz mesajın içeriğinin ticari elektronik ileti olmadığını düşünüyorsanız bu parametreyi göndermeniz gerekmiyor bu durumda İYS'den sorgulama yapılmadan doğrudan alıcıya mesajlar gönderilecektir. Bu durumda sorumluluk mesajı gönderen abonededir. İleti Yönetim Sistemi hakkında bilgi almak için detaylı bilgiye, buradan ulaşabilirsiniz.

    Mükerrer olarak raporlanan SMS'in anlamı; abonelerimiz, bir saat içerisinde aynı mesaj içeriğini aynı numaraya göndermek istediklerinde koruma amaçlı filtreye takılırlar. Bu durumu önlemek için çağrı merkezi ile görüşerek mükerrer filtresini sesli onayınız ile kaldırtabilirsiniz ya da farklı mesaj metin içerikli SMS gönderim testlerinde bulunabilirsiniz.


SOAP Servisi SMS Gönderme
    SMS'lerinizi 1:n yöntemiyle birden fazla numaraya aynı anda tek gönderimde iletebilirsiniz.
    Birden fazla SMS metninin farklı numaralara iletimi için n:n yöntemini tercih ederek, aynı anda tek gönderim yapabilirsiniz.
    Yüklü miktardaki SMS'lerinizi tek tek (her pakette bir numara) göndermeniz durumunda SMS'leriniz sistem tarafından biriktirilerek 1 dakika içerisinde iletilir. SMS'lerinizi bize çoklu paketler halinde göndermeniz bu durumun önüne
    
username: 	Sisteme giriş yaparken kullanılan kullanıcı adıdır. Bu alana abone numarası da yazılabilir (8xxxxxxxxx). İstek yapılırken gönderilmesi zorunludur. 	1:N

password: 	Sisteme giriş yaparken kullanılan şifredir. İstek yapılırken gönderilmesi zorunludur. 	1:N

header: 	Sistemde tanımlı olan mesaj başlığınızdır (gönderici adınız). En az 3, en fazla 11 karakterden oluşur. 	1:N

msg: 	SMS metninin yer alacağı alandır. 	1:N

msg[ ]: 	SMS metninin yer alacağı alandır.Nn sms gönderimlerinde array olarak gönderilmelidir. 	N:N

gsm[ ]: 	SMS in gideceği numaraları temsil eder array gönderilmeli 	1:N, N:N

encoding: 	Türkçe karakter desteği isteniyorsa bu alana TR girilmeli, istenmiyorsa null olarak gönderilmelidir. SMS boyu hesabı ve ücretlendirme bu parametreye bağlı olarak değişecektir. 	1:N

startdate: 	Gönderime başlayacağınız tarih. (ddMMyyyyHHmm) * Boş bırakılırsa mesajınız hemen gider. 	1:N

stopdate: 	İki tarih arası gönderimlerinizde bitiş tarihi.(ddMMyyyyHHmm)* Boş bırakılırsa sistem başlangıç tarihine 21 saat ekleyerek otomatik gönderir. 	1:N

bayikodu: 	Bayi üyesi iseniz bayinize ait kod 	1:N

filter: 	Ticari içerikli SMS gönderimlerinde bu parametreyi kullanabilirsiniz. Ticari içerikli bireysele gönderilecek numaralar için İYS kontrollü gönderimlerde ise "11" değerini, tacire gönderilecek İYS kontrollü gönderimlerde ise "12" değerini almalıdır. null gönderildiği taktirde filtre uygulanmadan gönderilecektir.İstek yapılırken gönderilmesi zorunludur. Ticari içerikli ileti gönderimi yapmıyorsanız 0 gönderilmelidir. 	1:N
