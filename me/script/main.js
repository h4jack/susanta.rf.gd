
const menuBtnOpen = document.getElementById("menuBtnOpen");
const menuBtnClose = document.getElementById("menuBtnClose");

const sidebar = document.getElementById("sidebar");
const showMenu = () => { return sidebar.style.display = "flex" };
const hideMenu = () => { return sidebar.style.display = "none" };
const isMenu = () => { return sidebar.style.display == "flex" };

menuBtnOpen.onclick = function () {
    menuBtnOpen.style.display = "none";
    menuBtnClose.style.display = "flex";
    showMenu();
};

menuBtnClose.onclick = function () {
    menuBtnClose.style.display = "none";
    menuBtnOpen.style.display = "flex";
    hideMenu();
};


const sidebarClose = document.getElementById("sidebar-close");

sidebarClose.onclick = () => {
    hideMenu();
    menuBtnClose.style.display = "none";
    menuBtnOpen.style.display = "flex";
};


const links = document.querySelectorAll('.sidebar a');

window.addEventListener('hashchange', () => {
    hashChange();
    hideMenu();
    menuBtnClose.style.display = "none";
    menuBtnOpen.style.display = "flex";
});

function hashChange() {
    links.forEach((link) => {
        link.classList.remove('active');
    });
    const currentHash = window.location.hash;
    const activeLink = document.querySelector(`a[href="${currentHash}"]`);
    if (activeLink) {
        activeLink.classList.add('active');
    } else {
        document.querySelector('a[href="#"]').classList.add('active');
    }
    matchHash(currentHash);
    hideMenu();
}

window.onload = () => {
    hashChange();
};

function focusOnElement(id) {
    // Get the element by ID
    const element = document.getElementById(id);
    if (element) {
        // Scroll the element into view
        element.scrollIntoView({
            behavior: 'smooth', // Smooth scrolling
            block: 'start',    // Center the element in the view
        });

        // Optionally, you can set focus if the element is focusable
        element.focus({ preventScroll: true });
    }
}

const mainSection = document.getElementById("main-section");

function makeToNormal() {
    mainSection.classList.remove("skills-section");
}

const changeTitle = (title) => {
    document.title = title + "- Susanta Mandi";
    const headerTitle = document.querySelector('header h1');
    headerTitle.innerText = title;
}

function matchHash(hash) {
    if (hash.substr(1, 6) == "skills") {
        showSkill(hash);
        changeTitle("Skills");
    } else {
        switch (hash) {
            case "#":
            case "#resume":
                showHome();
                changeTitle("Home");
                break;
            case "#skills":
                showSkill();
                changeTitle("Skills");
                break;
            case "#about":
                showAbout();
                changeTitle("About");
                break;
            case "#contact":
                break;
            default:
                showHome();
                changeTitle("Home");
        }
    }
}


function showHome() {
    makeToNormal();
    mainSection.innerHTML = `
            <div class="profile-image" draggable="true"></div>
            <div class="profile-content">
                <p class="myname">Hello, I'm<br><b>Susanta Mandi</b></p>
                <div class="myspec">
                    <p>Software Engineer | Web Developer | Cyber Security Analyst</p>
                </div>
            </div>
            <p>Welcome <a href="#" onclick="menuBtnOpen.click();">Check</a> the Menu button to access more..</p>
`;
}

function showOther() {
    mainSection.innerHTML = "";
}

function showAbout() {
    mainSection.innerHTML = `
                <section class="about">
                <h1>About Me</h1>
                <p>Hello! I'm Susanta Mandi, a dedicated software developer with a passion for creating innovative
                    solutions and delivering exceptional user experiences. My specialization in C and C++ has allowed me
                    to build high-performance applications and tackle complex programming challenges.</p>

                <h2>Professional Background</h2>
                <p>I hold a Bachelor's degree in Computer Science from Bankura University, where I developed a strong
                    foundation in software engineering and project management. Over the past 2 years, I've worked on
                    projects contributed to them, focusing on web and coommand line application.</p>
                <p>My work experience includes roles at my <a href="/">Own Site</a> as a Developer, where I managed my
                    whole projects, used advance technologies managed contributors, teams to build a
                    scalable CMS(Content Management Software) platform, and I have also contributed to many open source
                    projects.</p>

                <h2>Skills and Expertise</h2>
                <p>I specialize in modern web technologies such as React, Node.js and PHP. My expertise also
                    extends to mobile development with Java and Kotlin, and I'm proficient in agile methodologies and
                    DevOps practices.</p>

                <h2>Personal Philosophy</h2>
                <p>My approach to development is driven by a commitment to creating clean, maintainable code and
                    delivering value to users. I believe in continuous learning and adapting to new technologies to stay
                    ahead in the fast-evolving tech landscape.</p>

                <h2>Career Goals</h2>
                <p>Looking ahead, I'm excited about exploring opportunities in AI and Machine Learning. I aim to
                    contribute to projects that have a meaningful impact and push the boundaries of technology.</p>

                <h2>Hobbies and Interests</h2>
                <p>Outside of coding, I enjoy hiking, travelling, photography, and experimenting with new tech gadgets.
                    I'm also an
                    avid reader of tech blogs and enjoy participating in local hackathons.</p>

                <h2>Achievements</h2>
                <p>In 2024, I was in top 500 of picoCTF2024. I also contributed
                    to an open-source project that won the top Contributor.</p>
                <p>In 2023, I was in the Team of Medical Expert System, in College Exhibition with Seniors, where i started knowing AI deeply, developed Interests about AI and ML.</p>

                <h2>Contact Information</h2>
                <p>Feel free to <a href="#contact">get in touch</a> if you'd like to collaborate on a project or just
                    have a chat about technology.</p>
            </section>`;
}

function showSkill(hash) {
    mainSection.classList.add("skills-section");
    // Function to fetch JSON data and build HTML content
    async function loadAndDisplayContent() {
        try {
            // Fetch the JSON data from the file
            const response = await fetch('./json/skills.json');
            const data = await response.json();

            // Build the HTML content
            const tocBox = data.mainSection.innerHTML.tocBox;
            const sections = data.mainSection.innerHTML.sections;

            let htmlContent = '';

            // Table of Contents
            htmlContent += `<div class="${tocBox.class}">`;
            htmlContent += `<h1>${tocBox.content[0].text}</h1>`;
            htmlContent += `<div class="${tocBox.content[1].class}">`;
            tocBox.content[1].links.forEach(link => {
                htmlContent += `<a href="${link.href}">${link.text}</a>`;
            });
            htmlContent += `</div></div>`;
            document.getElementById('main-section').innerHTML = htmlContent;

            // Sections
            sections.forEach(section => {
                htmlContent = "";
                htmlContent += `<h1 id="${section.id}">${section.title}</h1>`;
                section.skills.forEach(skill => {
                    htmlContent += `<div class="skills-item" draggable="true">`;
                    htmlContent += `<h3>${skill.name}</h3>`;
                    if (skill.level) {
                        if (skill.percentage) {
                            htmlContent += `<div class="level-box">`;
                        } else {
                            htmlContent += `<div class="level-box right-align">`;
                        }
                        htmlContent += `<p>${skill.level}</p>`;
                        if (skill.percentage) {
                            htmlContent += `<div class="l-bar-box">`;
                            htmlContent += `<div class="l-bar ${skill.class}"><p>${skill.percentage}</p></div>`;
                            htmlContent += `</div>`
                        }
                        htmlContent += `</div>`;
                    }
                    if (skill.description) {
                        htmlContent += `<div class="skil-discription">${skill.description}</div>`;
                    }
                    htmlContent += `</div>`;
                });
                document.getElementById('main-section').innerHTML += htmlContent;
            });
            focusOnElement(hash.substr(1));
        } catch (error) {
            console.error('Error loading or displaying content:', error);
        }

    }

    // Call the function to load and display content
    loadAndDisplayContent();
}