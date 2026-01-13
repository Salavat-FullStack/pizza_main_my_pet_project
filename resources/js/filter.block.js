document.addEventListener('DOMContentLoaded', () => {

const filterContainer = document.querySelector('.main_filter_block');
const filterPanel = document.querySelector('.filter_panel');
const filterBtns = document.querySelectorAll('.filtr_btn');
const btnMore = document.querySelector('.more_filter_btn');
const filterData = JSON.parse(filterPanel.dataset.filter);
const dropMenu = document.querySelector('.drop_menu_filter');

console.log(filterData);

if (filterData.length > 7) {
    btnMore.classList.add('active');
}

const newArr = filterData.slice(7);

newArr.forEach(elem =>{
    const filterBtn = document.createElement('div');
    filterBtn.textContent = elem['name'];

    dropMenu.append(filterBtn);
})

btnMore.addEventListener('click',()=>{
    dropMenu.classList.toggle('active');
    dropMenu.classList.toggle('display_none');
});

});