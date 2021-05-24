# Student Project: Fullstack Assignment
![banner](public/media/image/course-banner.png)
***

## Assignment Background
3-part assignment series for COSC2430 Web Programming at RMIT University Vietnam. Development history can be found here:
- Phase 1: https://github.com/kuri-team/yabe-online-mall.github.io (archived on Jun 1st 2021)
- Phase 2: https://github.com/kuri-team/yabe-online-mall (archived on Jun 1st 2021)
- Phase 3: https://github.com/kuri-team/yabe-mall

## Assignment Requirements

### 1. Background

After completing the RMIT's Web Programming course with an HD grade, you feel very motivated and decide to found a start-up specializing in mobile and web application development. Despite its small size and lack of experience, your company aims to compete directly with larger firms by providing innovative design, enjoyable UI/UX, and timely support service. Now, the only thing you need is to have very challenging projects to prove your start-up's worth.

By actively participating in networking events and knowledge-sharing workshops, you've increased significantly the number of people who can recognize your business name and logo. Founded only one month ago, your start-up has successfully built and launched more than 10 small and medium websites. You feel OK but not so exciting. You want to do something that can scare you!

Eventually, you get one today.

Your client is a multimillionaire and world-class serial entrepreneur. She has created and sold businesses in diverse industries as education, health-care, and event management. This time, she intends to build an online mall where store owners and shoppers around the world can easily sell and buy products. Seize this opportunity to make your brand unforgettable.

### 2. User Roles

There are 4 main user roles in this online mall:

Mall admins: these are users who can do every stuff on the website, such as setting mall renting prices and commission percentages, deciding which ads to display, backing up and restoring data, etc.

Store owners: those people rent virtual spaces from the mall owner. The rented spaces are used by store owners to manage their products as well as to provide shopping interfaces to shoppers. Products' names, prices, categories, descriptions, images, etc. are controlled by their respective store owners. Store owners have to pay the mall owner renting fees periodically and commission fees every time they sell a product successfully.

Shoppers: shoppers are people who browse, search, view, and buy products listed in the mall/stores. Shoppers can keep track of their favorite stores and products. They can also view their past transactions.

Guest: guests are similar to shoppers, but they can browse, search, and view products only. To be able to save favorite stores, products and buy products, guests need to register shopper accounts (and hence become shoppers).

### 3. General Requirements

In this first stage, the client wants you to design and implement UI/UX parts of the mall using HTML & CSS. To attract as many visitors as possible, the client wants the new website to support at least 3 types of device:
- Desktop computer: `1024px` or higher width
- Tablet: `768px` to `1023px` pixels width
- Smartphone: `767px` or lower width

Here are some places where you may need to provide different UI component arrangements for different device types:
- Navigation menu bar: always-visible horizontal navigation menu on desktop computers vs. alternating between visible and hidden vertical navigation menu on tablets/smartphones
- Input form: a label and its linked input field may be positioned on the same line on desktop computers, but they should be placed on 2 different lines on tablets/smartphones
- Layout: a multi-column layout on desktop computers may collapse into a one-column layout on tablets/smartphones

Even though Google Chrome has been selected as the main browser to test this mall, the client believes there may be many people who visit the mall using Safari, Firefox, and MS Edge. She expects the same support for those alternative browsers. After explaining to her that it is very difficult to achieve the above conditions perfectly, she agrees to test your work with the latest version of those browsers only. The summary of supported browsers is given below
- Chrome
- Safari
- Firefox
- MS Edge

More requirements are listed below:

- Website colors need to be professional and consistent across pages. The color combination should be eye-catching
- There should be enough contrast between background and text colors. The text should be legible on all devices
- Easy navigation between pages. Links and normal texts should be easily differentiated
- Accessibility needs to be enforced, e.g. always use the "alt" attribute to describe images; use the fallback mechanism for videos/audios/fonts to ensure at least visitors see something; etc.
- Follow SEO guidelines to make the mall website search engine-friendly. Use semantic elements whenever possible.

### More specific details provided on [RMIT Canvas](https://rmit.instructure.com/courses/86190/assignments/571078) (Login with RMIT ID)
***

## Implementation

### 1. Deployment
#### Yabe online mall e-commerce website, deployed with Heroku: https://yabe-mall.herokuapp.com/ (`main` branch)
Backup: https://kuri-team.github.io/yabe-mall/ (`release-2.4-05-08-21` branch) - static website

### 2. Coding styles & conventions
#### Front-end
- [HTML & CSS The Right Way](http://htmlcsstherightway.org/)
- [Kuri Front-end Guidelines](https://github.com/kuri-team/front-end-guidelines)

#### Back-end
- [Clean Code PHP by @jupeter](https://github.com/jupeter/clean-code-php/tree/master#readme)
- [Clean Code PHP - Variables by @jupeter](https://github.com/jupeter/clean-code-php/tree/var_dump#readme)
- [PSR-1 by PHP-Fig](https://www.php-fig.org/psr/psr-1/)
- [PSR-12 by PHP-Fig](https://www.php-fig.org/psr/psr-12/)

#### Further readings
- [PHP The Right Way](https://phptherightway.com/)

### 3. Key people

- Instructor: Tri Dang, PhD. [@TriDang](https://github.com/TriDang) | [website](https://tridang.info/index.php/about/)
- Student: Mike Vo [@miketvo](https://github.com/miketvo) | [website](https://miketvo.com)
- Student: Doan Yen Nhi [@doanyennhi](https://github.com/doanyennhi)
- Student: Du Duc Manh [@rider3458](https://github.com/rider3458)
- Student: Tran Ngoc Anh Thu [@tnathu-ai](https://github.com/tnathu-ai)
***

## Grading Instructions: Local Environment Setup
This part is intended to guide RMIT grading staff to set up their local environment to host our application correctly for grading purpose, as requested by our instructor [@TriDang](https://github.com/TriDang). Ignore this part if it is not applicable to you.

Please make sure that you have PHP version 7.4 installed on your system. No other software or libraries required.

* Step 1: Unzip our submission .zip file to a location of your choice. E.g. `/home/documents/yabe-mall/`
* Step 2: Use the command line to navigate to the aforementioned folder
* Step 3: Start the PHP built-in web server on `localhost:80`, with the document root set to the `public` folder __!!IMPORTANT!!__. If you have added PHP in your `PATH` variable, you can use this command: `php -S localhost:80 -t public`.

Please note that you **must** set the document root of your web server to `public`, otherwise our application would not work.

The grading Rubric is available on the [Assignment Page](https://rmit.instructure.com/courses/86190/assignments/571078) (RMIT ID required to login).
