document.addEventListener('DOMContentLoaded', () => {

const sortingPanel = document.querySelector('.sorting_panel');
const sortingData = JSON.parse(sortingPanel.dataset.sorting);
const sortingText = document.querySelector('.sorting_text');
const btnSorting = document.querySelector('.sorting_panel');
const dropMenu = document.querySelector('.drop_menu');


sortingText.textContent = sortingData[0].name;

console.log(sortingData);
console.log(sortingData[0].name);

btnSorting.addEventListener('click',()=>{
    dropMenu.innerHTML = '';
    dropMenu.classList.toggle('active');
    dropMenu.classList.toggle('display_none');

    const sortingValue = sortingText.textContent;
    let sortingArray = sortingData.filter(item => item.name !== sortingValue);
    let sort = '';

    sortingArray.forEach(elem =>{
        const sortItem = document.createElement('div');
        sortItem.textContent = elem.name;

        sortItem.addEventListener('click', ()=>{
            sort = sortItem.textContent;
            console.log(sort);
            dropMenu.classList.add('display_none');
            dropMenu.classList.remove('active');

            sortingText.textContent = sort;

            sortingArray = sortingData.filter(item => item.name !== sort);

            sortingArray.forEach(elem =>{
                const sortItem = document.createElement('div');
                sortItem.textContent = elem.name;
                dropMenu.append(sortItem);
            });
        });

        dropMenu.append(sortItem);
    });
});

});
