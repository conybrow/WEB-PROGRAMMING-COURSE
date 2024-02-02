const resizer = document.getElementById('resizer');
const paneA = document.getElementById('paneA');
const paneB = document.getElementById('paneB');
const container = document.querySelector('.container');

resizer.addEventListener('mousedown', initResize);

function initResize(e) {
    e.preventDefault();

    window.addEventListener('mousemove', handleResize);
    window.addEventListener('mouseup', () => {
        window.removeEventListener('mousemove', handleResize);
    });
}

function handleResize(e) {
    const containerRect = container.getBoundingClientRect();
    const containerLeft = containerRect.left;

    const mouseX = e.clientX - containerLeft;

    const percentageA = (mouseX / containerRect.width) * 100;
    const percentageB = 100 - percentageA;

    paneA.style.width = `${percentageA}%`;
    paneB.style.width = `${percentageB}%`;
}