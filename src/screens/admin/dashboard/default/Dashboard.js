import React from 'react';
import AdminDashboardMenusData from '../../../../data/admin/dashboard/menus/default/Menus';
import ListsMenusMediumSquare from '../../../../components/lists/menus/mediumSquare/default/MediumSquare';

const AdminDashboard = ({ navigation }) => {
  return (
    <ListsMenusMediumSquare
      listData={AdminDashboardMenusData}
      navigationMain={navigation}
    />
  );
};

const AdminDashboardMeta = {
  title: 'Dashboard',
};

export { AdminDashboard, AdminDashboardMeta };
