function changeFontStyle(e) {
    const text = document.querySelector('.box')
    console.log(e.target.id);
    if (e.target.id === 'bold') {
        e.target.classList.toggle('active');
        text.classList.toggle('bold');
    }
    if (e.target.id === 'italic') {
        e.target.classList.toggle('active');
        text.classList.toggle('italic');
    }
    if (e.target.id === 'underlined') {
        e.target.classList.toggle('active');
        text.classList.toggle('underlined');
    }
}

const btnAction = document.querySelector('.btn-action');
btnAction.addEventListener('click', changeFontStyle);