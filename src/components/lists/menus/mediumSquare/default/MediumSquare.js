import React from 'react';
import { StyleSheet, FlatList, Dimensions } from 'react-native';
import ButtonsMediumSquare from '../../../../buttons/medium_square/default/MediumSquare';

const ListsMenusMediumSquare = (props) => {
  return (
    <FlatList
      style={styles.ListsMenusButtonsMediumSquareButton}
      data={props.listData}
      renderItem={({ item }) => (
        <ButtonsMediumSquare
          navigationMain={props.navigationMain}
          menuItem={item}
        />
      )}
      numColumns="2"
    />
  );
};

const styles = StyleSheet.create({
  ListsMenusButtonsMediumSquareButton: {
    borderRadius: 15,
    height: Dimensions.get('window').width / 2,
    flex: 1,
    marginHorizontal: 10,
    marginVertical: 20,
  },
});

export default ListsMenusMediumSquare;
