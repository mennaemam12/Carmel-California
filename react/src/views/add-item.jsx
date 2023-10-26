import React, { useState } from 'react';
import axiosClient from '../axios-client';

const AddMenuItem = () => {
  const [image, setImage] = useState('');
  const [title, setTitle] = useState('');
  const [price, setPrice] = useState('');
  const [description, setDescription] = useState('');
  const [category, setCategory] = useState('breakfast');


  const titleRef = useRef();
  const priceRef = useRef();
  const descriptionRef = useRef();
  const categoryRef = useRef();


  const handleSubmit = async (e) => {
    e.preventDefault();
    const payload ={
        image: files[0],
        title: titleRef,
        price: priceRef,
        description: descriptionRef,
        category: categoryRef
    }
    try{
        const response = await axiosClient.post('/signup',payload);
        if(response.status == 200)
        {
        }
        
    }
    catch(error){
        console.log(error);x
    }
    
        
    }

  return (
    <div className="menu-item-form">
      <form onSubmit={handleSubmit}>
        <label>
          Image URL:
          <input type="file" value={image} onChange={(e) => setImage(e.target.value)} />
        </label>
        <label>
          Title:
          <input type="text" value={title} onChange={(e) => setTitle(e.target.value)} />
        </label>
        <label>
          Price:
          <input type="text" value={price} onChange={(e) => setPrice(e.target.value)} />
        </label>
        <label>
          Description:
          <textarea value={description} onChange={(e) => setDescription(e.target.value)} />
        </label>
        <label>
          Category:
          <select value={category} onChange={(e) => setCategory(e.target.value)}>
            <option value="breakfast">Breakfast Item</option>
            <option value="appetizer">Appetizer</option>
            <option value="main-dish">Main Dish</option>
            <option value="drink">Drink</option>
            <option value="coffee">Coffee</option>
            <option value="dessert">Dessert</option>
          </select>
        </label>
        <button type="submit">Add Menu Item</button>
      </form>
    </div>
  );
};

export default AddMenuItem;