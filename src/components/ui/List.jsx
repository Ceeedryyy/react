import { useEffect, useState } from 'react';

export default function List() {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(true);
        
    useEffect(() => {
        const fetchUsers = async () => {
            try {
                const response = await axios.get('https://jsonplaceholder.typicode.com/users');
            }
            catch (error) {
                console.error('Error fetching data:', error.message);
            }
            finally {
                setLoading(false);
            }
        };

    }, []);

    if (loading) {
        return <p>Loading...</p>;
    }

    return(
        <ul>
            {users.map((user) => (
                <li key={user.id}>{user.name}</li>
            ))}
        </ul>
   )
}
