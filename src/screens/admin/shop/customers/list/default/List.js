import React, { useState, useEffect, useCallback } from 'react';
import { StyleSheet } from 'react-native';
import { AdminShopCustomersListDataURL } from '../../../../../../data/admin/shop/customers/list/default/List';
import ListsItemsUsersPictureText from '../../../../../../components/lists/items/users/pictureText/default/pictureText';

const AdminShopCustomersList = ({ navigation }) => {
  const [isRefreshing, setIsRefreshing] = useState(false);
  const [customers, setCustomers] = useState([]);

  const handleFetchCustomers = useCallback(async () => {
    const response = await fetch(AdminShopCustomersListDataURL);
    if (response.ok) {
      const customers = await response.json();
      // console.log(customers);
      setCustomers(customers);
    }
  }, []);

  useEffect(() => {
    handleFetchCustomers();
  }, []);

  const handleRefresh = useCallback(async () => {
    setIsRefreshing(true);
    await handleFetchCustomers();
    setTimeout(() => {
      setIsRefreshing(false);
    }, 1000);
  });

  return (
    <ListsItemsUsersPictureText
      listData={customers}
      navigationMain={navigation}
      refreshing={isRefreshing}
      onRefresh={handleRefresh}
    />
  );
};

const styles = StyleSheet.create({});

const AdminShopCustomersListMeta = {
  title: 'Clients',
};

export { AdminShopCustomersList, AdminShopCustomersListMeta };
